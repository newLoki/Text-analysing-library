<?php
/**
 * 
 * @author newloki
 */

namespace Tests\Language\Languages\Indo\German;
use Language\Languages\LanguagesAbstract;


require_once realpath(LIBRARY_PATH . '/Language/Languages/LanguagesAbstract.php');
class LanguagesAbstractTest extends \PHPUnit_Framework_TestCase
{
    /** @var $_language Langugae\Languages\LanguagesAbstract */
    protected $_language;

    protected $_name = 'foo';

    public function setUp()
    {
        try {
            $this->_language = $this->getMockForAbstractClass('LanguagesAbstract');
        } catch(\Exception $e) {
            //handle Exception, because there is a bug in PHPUnit until version
            // 3.5.4 who prevent mocking abstract class
            $this->markTestSkipped('Can\'t get mock from LanguagesAbstract class');
        }
    }

    public function testShouldSetName()
    {
        $this->_language->setName($this->_name);
        $this->assertInternalType('string', $this->_language->getName());
        $this->assertEquals($this->_name, $this->_language->getName());
    }

    public function testShouldGetName()
    {
        //name is resetet to default, because setUp is runnig before each test
        //method
        $this->assertEmpty($this->_language->getName());
    }
}
