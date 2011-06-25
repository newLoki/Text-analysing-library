<?php
/**
 * This class represents a word
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

    protected $_counter;

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

    /**
     * Setter for counter
     *
     * @param int $counter
     * @return void
     */
    public function setCounter($counter)
    {
        $this->_counter = $counter;
    }

    /**
     * Getter for counter
     *
     * @return int
     */
    public function getCounter()
    {
        return $this->_counter;
    }

    /**
     * Increase counter for this word by given steps (default is one)
     *
     * @param int $_steps
     * @return void
     */
    public function incrementCounter($_steps = 1)
    {
        $this->_counter += (int) $_steps;
    }

}
