<?php
/**
 * 
 * @author newloki
 */
namespace Tests\Language\Languages\Indo\IndoAbstract;
use Language\Languages\Indo\IndoAbstract;

require_once realpath(LIBRARY_PATH) . '/Language/Languages/Indo/IndoAbstract.php';


class IndoAbstractTest extends \PHPUnit_Framework_TestCase
{
     /** @var $_language Langugae\Languages\Indo\IndoAbstract */
    protected $_language;

    protected $_defaultMapping = array(
        'a' => IndoAbstract::VOCAL,
        'b' => IndoAbstract::CONSONANT,
        'c' => IndoAbstract::CONSONANT,
        'd' => IndoAbstract::CONSONANT,
        'e' => IndoAbstract::VOCAL,
        'f' => IndoAbstract::CONSONANT,
        'g' => IndoAbstract::CONSONANT,
        'h' => IndoAbstract::CONSONANT,
        'i' => IndoAbstract::VOCAL,
        'j' => IndoAbstract::CONSONANT,
        'k' => IndoAbstract::CONSONANT,
        'l' => IndoAbstract::CONSONANT,
        'm' => IndoAbstract::CONSONANT,
        'n' => IndoAbstract::CONSONANT,
        'o' => IndoAbstract::VOCAL,
        'p' => IndoAbstract::CONSONANT,
        'q' => IndoAbstract::CONSONANT,
        'r' => IndoAbstract::CONSONANT,
        's' => IndoAbstract::CONSONANT,
        't' => IndoAbstract::CONSONANT,
        'u' => IndoAbstract::VOCAL,
        'v' => IndoAbstract::CONSONANT,
        'w' => IndoAbstract::CONSONANT,
        'x' => IndoAbstract::CONSONANT,
        'y' => IndoAbstract::VOCAL,
        'z' => IndoAbstract::CONSONANT
    );

    public function setUp()
    {
        try {
            $this->_language = $this->getMockForAbstractClass('IndoAbstract');
        } catch(\Exception $e) {
            //handle Exception, because there is a bug in PHPUnit until version
            // 3.5.4 who prevent mocking abstract class
            $this->markTestSkipped('Can\'t get mock from IndoAbstract class');
        }
    }

    public function testShouldGetCVMapping()
    {
        $mapping = $this->_language->getCVMapping();

        $this->assertInternalType('array', $mapping);
        $this->assertNotEquals($this->_defaultMapping, $mapping);
    }

    public function testSetCVMapping()
    {
        $expected = array(
            'a' => 'V',
            'b' => 'C',
            'c' => 'C'
        );

        $this->_language->setCVMapping($expected);
        $this->assertEquals($expected, $this->_language->getCVMapping);
    }

    public function testShouldAddToCVMapping()
    {
        $expected = array(
            'aa' => 'V',
            'BB' => 'C'
        );
        foreach($expected as $key => $value) {
            $this->_language->addToCVMapping($key, $value);
        }

        $this->assertArrayHasKey('aa', $this->_language->getCVMapping());
        $this->assertArrayHasKey('bb', $this->_language->getCVMapping());
    }

    public function testShouldThrowExceptionIncaseOfExistingKey()
    {
        $this->setExpectedException('LanguagesException');
        $this->_language->addToCVMapping('a', 'V');
    }

    public function testShouldReplaceEntryInMapping()
    {
        $this->_language->replaceInCVMapping('a', 'C');
        $this->_language->replaceInCVMapping('B', 'V');

        $mapping = $this->_language->getCVMapping();
        $this->assertArrayHasKey('a', $mapping);
        $this->assertArrayHasKey('b', $mapping);
        $this->assertArrayNotHasKey('B', $mapping);

        $this->assertEquals('C', $mapping['a']);
        $this->assertEquals('V', $mapping['b']);
    }

    public function testShouldThrowExceptionIncaseOfNotExistingKey()
    {
        $this->setExpectedException('LanguagesException');
        $this->_language->addToCVMapping('aaa', 'V');
    }
}
