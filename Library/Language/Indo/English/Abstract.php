<?php
/**
 * 
 * @author newloki
 */
 
abstract class Language_Indo_Englisch_Abstract extends Language_Indo_Abstract
{
    /**
     * Name of this language
     * @var string
     */
    protected $_name = 'english_abstract';

    /**
     * constructor for english languages, not called in this class, but in his
     * childs
     * @return void
     */
    public function __construct()
    {
        //in english Y is almost an vocal
        try {
            $this->replaceInCVMapping('y', Language_Indo_Abstract::VOCAL);
        } catch(Language_Exception $e) {
            throw new Language_Exception('Can\'t create ' . $this->_name, $e);
        }
    }
}
