<?php
/**
 * 
 * @author newloki
 */
namespace Language\Languages\Indo\English;
use Language\Languages\Indo\IndoAbstract,
    Language\Languages\LanguagesException;

require_once realpath(__DIR__) . '/../IndoAbstract.php';

abstract class EnglishAbstract extends IndoAbstract
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
            $this->replaceInCVMapping('y', IndoAbstract::VOCAL);
        } catch(LanguagesException $e) {
            throw new LanguagesException('Can\'t create ' . $this->_name, $e);
        }
    }
}
