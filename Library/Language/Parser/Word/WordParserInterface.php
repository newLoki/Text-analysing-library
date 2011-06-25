<?php
/**
 * 
 * @author newloki
 */
namespace Language\Parser\Word;
use Language\Languages\LanguagesAbstract;

interface WordParserInterface
{
    public function parse($_word, LanguagesAbstract $_language);
}
