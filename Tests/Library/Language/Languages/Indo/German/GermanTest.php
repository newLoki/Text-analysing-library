<?php
/**
 * 
 * @author newloki
 */
namespace Tests\Language\Languages\Indo\German;
use Language\Languages\Indo\German\German,
    Language\Languages\Indo\IndoAbstract;


require_once realpath(LIBRARY_PATH . '/Language/Languages/Indo/German/German.php');
require_once realpath(LIBRARY_PATH . '/Language/Languages/Indo/IndoAbstract.php');

class GermanTest extends \PHPUnit_Framework_TestCase
{
    protected $_additionalCVMapping = array(
        '§' => IndoAbstract::CONSONANT,
        'Ÿ' => IndoAbstract::VOCAL,
        'š' => IndoAbstract::VOCAL,
        'Š' => IndoAbstract::VOCAL
    );

    /** @var \Language\Languages\German\German */
    protected $_german;

    public function setUp()
    {
        $this->_german = new German();
    }

    public function testClassShouldHaveMappingIncludingAdditional()
    {
        $result = $this->_german->getCVMapping();

        foreach($this->_additionalCVMapping as $key => $value)
        {
            $this->assertArrayHasKey($key, $result);
            $this->assertEquals($value, $result[$key]);
        }
    }

    public function testNameShouldBeGerman()
    {
        $this->assertEquals('german', $this->_german->getName());
    }
}
