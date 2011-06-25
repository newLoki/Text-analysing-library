<?php
/**
 * 
 * @author newloki
 */
namespace \Language\Languages;

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
