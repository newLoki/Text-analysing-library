<?php

$parser = new parser();
$parser->run();

class parser
{
    /** @var string basename of senti files */
    protected $_basename = 'SentiWS_v1.8b';

    /** @var string directory where senti is stored */
    protected $_basedir = '../../ThirdParty/SentiWS_v1.8b/';

    /** @var string output sql file name */
    protected $_outputFile = '002_SentiWS_DATA_INSERT.sql';

    /** @var array parseable files (combined with $_basename) */
    protected $_inputFiles = array(
        '_Negative.txt',
        '_Positive.txt'
    );

    /** @var array $_typeMapping mapping to get full types */
    protected $_typeMapping = array(
        'NN'   => 'noun',
        'ADJX' => 'adjective',
        'ADV'  => 'adverb',
        'VVINF' => 'verb',
    );

    /** @var file pointer for outputfile */
    protected $_outputHandle;

    /**
     * Run method for this parser
     * @return void
     */
    public function run()
    {
        $this->_outputHandle = @fopen(realpath(__DIR__) . '/' .
                                 $this->_outputFile, "a"); //attach mode
        foreach($this->_inputFiles as $inFile) {
            echo "Proceed file: " . $this->_basename . $inFile . PHP_EOL;
            $handler = @fopen(realpath(__DIR__ . '/' . $this->_basedir)
                                  . '/' . $this->_basename . $inFile, "r");
            $this->textToSQL($handler);
        }
        echo "Finished" . PHP_EOL;
    }

    /**
     * Iterate over given file handler and write a set of INSERT statements for
     * each line
     *
     * @param ressource $_fileHandler
     * @return void
     */
    protected function textToSQL($_fileHandler)
    {
        while(($buffer = fgets($_fileHandler)) !== false) {
            $results = $this->splitLine($buffer);
            $this->writeSQL($results);
        }
    }

    /**
     * Write builded query to sql output file
     * @param array $results
     * @return void
     */
    protected function writeSQL($results)
    {
        foreach($results as $result) {
            $query = $this->buildQuery($result);
            fwrite($this->_outputHandle, $query);
        }
    }

    /**
     * Build an INSERT query for the given result
     * @param array $_result
     * @return mixed|string
     */
    protected function buildQuery($_result)
    {
        $sql = 'INSERT INTO `sentiws`';
        $sql .= '(`word`, `base`, `type`, `weight`) VALUES (';
        $sql .= "'" . $_result['word'] . "', ";
        $sql .= "'" . $_result['base'] . "', ";
        $sql .= "'" . $_result['type'] . "', ";
        $sql .= $_result['weight'] . ');';

        $sql = preg_replace('/\t|\n|\r|\c|/', '', $sql);
        $sql .= PHP_EOL;

        return $sql;
    }

    /**
     * Split given line into specific format
     *
     * @param string $_line
     * @return array
     */
    protected function splitLine($_line)
    {
        $resultset = array();

        // base|type \t weight <form1>,<form2>, ..., <formN)
        $cache = explode('|', $_line);
        $baseWord = $cache[0];
        $cache = preg_split('/\t/', $cache[1]);
        $type = $this->getType($cache[0]);
        $weight = 0.00;
        if(count($cache) >= 2) {
            $weight = $cache[1];
        }
        $forms = array($baseWord);
        if(count($cache) >= 3) {
            $forms = explode(',', $cache[2]);
        }

        foreach($forms as $form) {
            $resultset[] = array(
                'word' => $form,
                'base' => $baseWord,
                'type' => $type,
                'weight' => $weight
            );
        }

        return $resultset;
    }

    /**
     * Map short type into long representation
     *
     * @param  $_type
     * @return array
     */
    protected function getType($_type)
    {
        return $this->_typeMapping[$_type];
    }

}