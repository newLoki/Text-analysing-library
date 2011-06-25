<?php
/**
 * This class should represent the whole text
 *
 * @author newloki
 */
namespace \Language\Text;
use \Language\Languages\LanguagesAbstract
    \Language\Word;

class Text
{
    /** @var string $_text */
    protected $_text;

    /** @var \Language\Languages\LanguagesAbstract $_language */
    protected $_language;

    /** @var array $_words */
    protected $_words = array();

    /**
     * Create an text object based on text as string and his corresponding
     * language
     *
     * @param  $_text
     * @param \Language\Languages\LanguagesAbstract $_language
     */
    public function __construct($_text, LanguagesAbstract $_language)
    {
        $this->_text = (string) $_text;
        $this->_language = $_language;
    }

    /**
     * Get an array of words for this text, if there are no words present,
     * this method call method to generate words from text
     *
     * @return array of \Language\Word\Word
     */
    public function getWords()
    {
        if(empty($this->_words)) {
            $this->_splitText();
        }

        return $this->_words;
    }

    /**
     * Set an word for this text, and give him a language (this give the
     * ability to use foreign words in text)
     *
     * @param  $_word
     * @param LanguagesAbstract|null $_language
     * @return void
     */
    public function setWord($_word, LanguagesAbstract $_language = null)
    {
        if (empty($_language)) {
            $_language = $this->_language;
        }

        $this->_words[$_word] = new Word($_word, $_language);
    }

    /**
     * Split this text into words and create a word object for each of them,
     * if there is nothing stored, else increase counter for this word
     *
     * @return void
     */
    protected function _splitText()
    {
        $words = str_word_count($this->_text, 1);
        foreach ($words as $word) {
            if (!array_key_exists($word, $this->_words)) {
                $this->_words[$word] = new Word($word, $this->_language);
            } else {
                /** @var $_word Word */
                $_word = $this->_words[$word];
                $_word->increaseCounter();
            }
        }
    }

    /**
     * Getter for language
     *
     * @return \Language\Languages\LanguagesAbstract|LanguagesAbstract
     */
    public function getLanguage()
    {
        return $this->_language;
    }
}
