<?php
/**
 * 
 * @author newloki
 */
namespace Tests\Language\Languages\Indo\English\UK;
use Language\Languages\Indo\English\EnglishAbstract,
    Language\Languages\Indo\IndoAbstract,
    Language\Languages\Indo\English\UK\Uk;


require_once realpath(LIBRARY_PATH . '/Language/Languages/Indo/English/UK/Uk.php');
require_once realpath(LIBRARY_PATH . '/Language/Languages/Indo/IndoAbstract.php');
class UkTest extends \PHPUnit_Framework_TestCase
{
    protected $_language;

    protected $_name = 'english_uk';

    public function setUp()
    {
        $this->_language = new Uk();
    }

    public function testShouldReturnRightName()
    {
        $this->assertEquals($this->_name, $this->_language->getName());
    }
}
