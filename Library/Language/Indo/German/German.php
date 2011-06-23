<?php
/**
 * 
 * @author newloki
 */
 
class Language_Indo_German_German extends Language_Indo_Abstract
{
    /**
     * German vowel and her mapping to consonants/vocals
     * @var array $_additionalCVMapping
     */
    protected $_vowelsCVMapping = array(
        '�' => Language_Indo_Abstract::CONSONANT,
        '�' => Language_Indo_Abstract::VOCAL,
        '�' => Language_Indo_Abstract::VOCAL,
        '�' => Language_Indo_Abstract::VOCAL
    );

    /**
     * Name of this language
     * @var string $_name
     */
    protected $_name = 'german';

    /**
     * Add vowels to language
     * @throws Language_Exception if he can't add vowels
     * @return void
     */
    public function __construct()
    {
        try {
            foreach($this->_vowelsCVMapping as $key => $value)
            {
                $this->addToCVMapping($key, $value);
            }
        } catch(Language_Exception $e) {
            throw new Language_Exception('Can\'t create ' . $this->_name, $e);
        }
    }

}
