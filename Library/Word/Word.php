<?php
/**
 * 
 * @author newloki
 */
namespace \Language\Word;
use \Language\Languages\LanguagesAbstract;

class Word
{
    /** @var \Language\Languages\LanguagesAbstract $_language */
    protected $_language;

    /** @var string $_word */
    protected $_word;

    /**
     * Create an word object based on text as string and his corresponding
     * language
     *
     * @param  $_word
     * @param \Language\Languages\LanguagesAbstract $_language
     */
    public function __construct($_word, LanguagesAbstract $_language)
    {
        $this->_word = (string) $_word;
        $this->_language = $_language;
    }
}
