<?php
/**
 * 
 * @author newloki
 */
namespace \Language\Parser\Word\Staemmer\Porter;
use \Language\Parser\ParserAbstract,
    \Language\Parser\Word\WordParserInterface,
    \Language\Languages\LanguagesAbstract;

class PorterParser extends ParserAbstract implements WordParserInterface
{
    /**
     * Get combination of consonants and vocals
     *
     * @todo implement special cases, for example, Y is an vocal in english
     * but if he is followed by a vocal he is an consonant
     *
     * @param  $_word
     * @param \Language\Languages\LanguagesAbstract $_language
     * @return string
     */
    protected function parse($_word, LanguagesAbstract $_language)
    {
        //iterate over each char
        //for each char look if it is consonant or vocal
        $wordVC = '';
        $mapping = $_language->getMapping();

        $chars = $this->getWordAsArray($_word);
        foreach($chars as $char) {
            $wordVC .= $mapping[$char];
        }

        $result = preg_replace('/\b(.)\1+/is', '\1', $wordVC);

        return $result;
    }
}
