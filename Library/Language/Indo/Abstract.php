<?php
/**
 * 
 * @author newloki
 */
 
abstract class Language_Indo_Abstract extends Language_Abstract
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
        'a' => Language_Indo_Abstract::VOCAL,
        'b' => Language_Indo_Abstract::CONSONANT,
        'c' => Language_Indo_Abstract::CONSONANT,
        'd' => Language_Indo_Abstract::CONSONANT,
        'e' => Language_Indo_Abstract::VOCAL,
        'f' => Language_Indo_Abstract::CONSONANT,
        'g' => Language_Indo_Abstract::CONSONANT,
        'h' => Language_Indo_Abstract::CONSONANT,
        'i' => Language_Indo_Abstract::VOCAL,
        'j' => Language_Indo_Abstract::CONSONANT,
        'k' => Language_Indo_Abstract::CONSONANT,
        'l' => Language_Indo_Abstract::CONSONANT,
        'm' => Language_Indo_Abstract::CONSONANT,
        'n' => Language_Indo_Abstract::CONSONANT,
        'o' => Language_Indo_Abstract::VOCAL,
        'p' => Language_Indo_Abstract::CONSONANT,
        'q' => Language_Indo_Abstract::CONSONANT,
        'r' => Language_Indo_Abstract::CONSONANT,
        's' => Language_Indo_Abstract::CONSONANT,
        't' => Language_Indo_Abstract::CONSONANT,
        'u' => Language_Indo_Abstract::VOCAL,
        'v' => Language_Indo_Abstract::CONSONANT,
        'w' => Language_Indo_Abstract::CONSONANT,
        'x' => Language_Indo_Abstract::CONSONANT,
        'y' => Language_Indo_Abstract::VOCAL,
        'z' => Language_Indo_Abstract::CONSONANT
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
     * @throws Language_Exception thrown if entry with given key already exists
     * @param  $_key
     * @param  $_value
     * @return void
     */
    public function addToCVMapping($_key, $_value)
    {
        if(!array_key_exists($_key, $this->_CVMapping)) {
            $this->_CVMapping[$_key] = (string) $_value;
        } else {
            throw new Language_Exception('Key ' . $_key . ' already exists in
                                        mapping table');
        }
    }

    /**
     * Replace a char in mapping if it exists
     * else throw an exception
     * @throws Language_Exception thrown if char doesn't exists
     * @param  $_key
     * @param  $_value
     * @return void
     */
    public function replaceInCVMapping($_key, $_value)
    {
        if(array_key_exists($_key, $this->_CVMapping)) {
            $this->_CVMapping[$_key] = (string) $_value;
        } else {
            throw new Language_Exception($_key . ' don\'t exists in
                                        mapping table');
        }
    }

}
