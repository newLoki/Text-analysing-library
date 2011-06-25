<?php
/**
 * 
 * @author newloki
 */
namespace Language\Languages;
require_once realpath(__DIR__) . '/LanguagesException.php';

abstract class LanguagesAbstract
{
    /**
     * Name of this language
     * @var string
     */
    protected $_name = '';

    /**
     * Getter for language name
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Setter for language name
     * @param string $_name
     * @return void
     */
    public function setName($_name)
    {
        $this->_name = (string) $_name;
    }

}
