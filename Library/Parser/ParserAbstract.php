<?php
/**
 * 
 * @author newloki
 */
namespace \Language\Parser;
use \Language\Languages\LanguagesAbstract;
class ParserAbstract
{
    /**
     * @var string $_text
     */
    protected $_text;

    /**
     * @var array $_splitText
     */
    protected $_splitText = array();

    /** @var LanguagesAbstract $_language */
    protected $_language;

    /**
     * Set referenting language object
     * @param Language_Abstract $_language
     * @param string $_text
     * @return void
     */
    public function __construct(LanguagesAbstract $_language, $_text)
    {
        $this->_language = $_language;
        $this->_text = (string) $_text;
    }

    /**
     * Set text and call split funtion
     * @param string $_text
     * @return void
     */
    public function setText($_text)
    {
        $this->_text = (string) $_text;
        $this->splitText();
    }

    /**
     * Getter for text
     * @return string
     */
    public function getText()
    {
        return $this->_text;
    }

    /**
     * If splitted representation of text is availeable returns this, else
     * split text first
     * @return array
     */
    public function getSplitText()
    {
        if(empty($this->_splitText)) {
            $this->splitText();
        }

        return $this->_splitText;
    }

    /**
     * Split text in words and set splitted text var
     * @return void
     */
    protected function splitText()
    {
        $this->_splitText = str_word_count($this->_text, 1);
    }

    /**
     * Return word as array representation char by char
     * @param  string $_word
     * @return array
     */
    protected function getWordAsArray($_word)
    {
        return str_split((string) $_word, 1);
    }

}
