<?php
/**
 * 
 * @author newloki
 */
namespace Language\Languages\Indo;
use Language\Languages\LanguagesAbstract,
    Language\Languages\LanguagesException;
require_once realpath(__DIR__) . '/../LanguagesAbstract.php';

abstract class IndoAbstract extends LanguagesAbstract
{
    /*
     * Shortcut for consonants
     */
    const CONSONANT = 'c';

    /*
     * Shortcut for vocals
     */
    const VOCAL = 'v';

    /**
     * Mapping which chars are vocals and which are consonants
     * @var array
     */
    protected $_CVMapping = array(
        'a' => IndoAbstract::VOCAL,
        'b' => IndoAbstract::CONSONANT,
        'c' => IndoAbstract::CONSONANT,
        'd' => IndoAbstract::CONSONANT,
        'e' => IndoAbstract::VOCAL,
        'f' => IndoAbstract::CONSONANT,
        'g' => IndoAbstract::CONSONANT,
        'h' => IndoAbstract::CONSONANT,
        'i' => IndoAbstract::VOCAL,
        'j' => IndoAbstract::CONSONANT,
        'k' => IndoAbstract::CONSONANT,
        'l' => IndoAbstract::CONSONANT,
        'm' => IndoAbstract::CONSONANT,
        'n' => IndoAbstract::CONSONANT,
        'o' => IndoAbstract::VOCAL,
        'p' => IndoAbstract::CONSONANT,
        'q' => IndoAbstract::CONSONANT,
        'r' => IndoAbstract::CONSONANT,
        's' => IndoAbstract::CONSONANT,
        't' => IndoAbstract::CONSONANT,
        'u' => IndoAbstract::VOCAL,
        'v' => IndoAbstract::CONSONANT,
        'w' => IndoAbstract::CONSONANT,
        'x' => IndoAbstract::CONSONANT,
        'y' => IndoAbstract::VOCAL,
        'z' => IndoAbstract::CONSONANT
    );

    /**
     * Getter for consonant/vocal mapping
     * @return array
     */
    public function getCVMapping()
    {
        return $this->_CVMapping;
    }

    /**
     * Setter for consonant/vocal mapping
     * @param array $_mapping
     * @return void
     */
    public function setCVMapping(array $_mapping)
    {
        $this->_CVMapping = $_mapping;
    }

    /**
     * Add a new entry to consonant/vocal mapping if it not exists
     * else throw an exception
     * @throws Language\Languages\LanguagesException thrown
     * if entry with given key already exists
     * @param  $_key
     * @param  $_value
     * @return void
     */
    public function addToCVMapping($_key, $_value)
    {
        $key = strtolower($_key);

        if(!array_key_exists($key, $this->_CVMapping)) {
            $this->_CVMapping[$key] = (string) $_value;
        } else {
            throw new LanguagesException('Key ' . $key . ' already exists in
                                        mapping table');
        }
    }

    /**
     * Replace a char in mapping if it exists
     * else throw an exception
     * @throws Languages_Exception thrown if char doesn't exists
     * @param  $_key
     * @param  $_value
     * @return void
     */
    public function replaceInCVMapping($_key, $_value)
    {
        $key = strtolower($_key);
        if(array_key_exists($key, $this->_CVMapping)) {
            $this->_CVMapping[$key] = (string) $_value;
        } else {
            throw new LanguagesException($key . ' don\'t exists in
                                        mapping table');
        }
    }

}
