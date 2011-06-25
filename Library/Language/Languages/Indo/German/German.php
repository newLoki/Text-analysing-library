<?php
/**
 * 
 * @author newloki
 */
namespace \Language\Languages\Indo\German;
use \Language\Languages\Indo\IndoAbstract,
    \Language\Languages\LanguagesException;

class German extends IndoAbstract
{
    /**
     * German vowel and her mapping to consonants/vocals
     * @var array $_additionalCVMapping
     */
    protected $_vowelsCVMapping = array(
        '§' => IndoAbstract::CONSONANT,
        'Ÿ' => IndoAbstract::VOCAL,
        'š' => IndoAbstract::VOCAL,
        'Š' => IndoAbstract::VOCAL
    );

    /**
     * Name of this language
     * @var string $_name
     */
    protected $_name = 'german';

    /**
     * Add vowels to language
     * @throws Languages_Exception if he can't add vowels
     * @return void
     */
    public function __construct()
    {
        try {
            foreach($this->_vowelsCVMapping as $key => $value)
            {
                $this->addToCVMapping($key, $value);
            }
        } catch(LanguagesException $e) {
            throw new LanguagesException('Can\'t create ' . $this->_name, $e);
        }
    }

}
