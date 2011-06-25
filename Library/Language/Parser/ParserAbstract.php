<?php
/**
 * Abstract class for parsers
 * @todo remove it and port code partly to new TextParserAbstract
 * @author newloki
 */
namespace Language\Parser;
use Language\Languages\LanguagesAbstract,
    Language\Text;

require_once realpath(__DIR__) . '/../Text/Text.php';

class ParserAbstract
{
    /** @var Language\Text\Text $_text */
    protected $_text;

    /**
     * Set textobject for parser
     * @param Language\Text\Text $_text
     */
    public function __construct(Text $_text)
    {
        $this->_text = $_text;
    }

    /**
     * Shorthand to get language of text
     *
     * @return \Language\Languages\LanguagesAbstract
     */
    protected function _getLanguage()
    {
        return $this->_text->getLanguage();
    }
}
