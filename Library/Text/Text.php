<?php
/**
 * This class should represent the whole text
 *
 * @author newloki
 */
namespace \Language\Text;
use \Language\Languages\LanguagesAbstract;

class Text
{
    /** @var string $_text */
    protected $_text;

    /** @var \Language\Languages\LanguagesAbstract $_language */
    protected $_language;

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
    
}
