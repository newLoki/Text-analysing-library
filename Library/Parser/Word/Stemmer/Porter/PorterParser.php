<?php
/**
 * 
 * @author newloki
 */
namespace \Language\Parser\Word\Staemmer\Porter;
use \Language\Parser\ParserAbstract,
    \Language\Parser\ParserInterface,
    \Language\Languages\LanguagesAbstract;

class PorterParser extends ParserAbstract implements ParserInterface
{
    /**
     * @var array
     * 'word' => 'format'
     */
    protected $_result = array();

    /**
     * @return array
     */
    public function parse()
    {
        foreach($this->_splitText as $word) {
            if(!array_key_exists($word, $this->_result)) {
                $this->_result[$word] = $this->getFormat($word);
            }
        }
        //@todo
        //maybe it is usefull to give a text back
        //where each word is replaced by himself followed by his format
        //in braces
        //e.g.: but(CVC) falling(CVCVC) computer(CVCVCVC)
        return $this->_result;
    }

    //@todo implement special cases, for example, Y is an vocal in english,
    //but if he is followed by a vocal he is an consonant
    protected function getFormat($_word)
    {
        //iterate over each char
        //for each char look if it is consonant or vocal
        $wordVC = '';
        $mapping = $this->_language->getMapping();

        $chars = $this->getWordAsArray($_word);
        foreach($chars as $char) {
            $wordVC .= $mapping[$char];
        }

        $result = preg_replace('/\b(.)\1+/is', '\1', $wordVC);

        return $result;
    }
}
