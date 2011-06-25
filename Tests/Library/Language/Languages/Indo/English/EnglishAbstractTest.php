<?php
/**
 * 
 * @author newloki
 */

namespace Tests\Language\Languages\Indo\English;
use Language\Languages\Indo\English\EnglishAbstract,
    Language\Languages\Indo\IndoAbstract,
    Language\Languages\Indo\English\UK\Uk;


require_once realpath(LIBRARY_PATH . '/Language/Languages/Indo/English/EnglishAbstract.php');
require_once realpath(LIBRARY_PATH . '/Language/Languages/Indo/IndoAbstract.php');

class EnglishAbstractTest extends \PHPUnit_Framework_TestCase
{
    public function testIfYIsAVocalByDefault()
    {
        try {
            /** @var $language Language\Languages\Indo\English\EnglishAbstract */
            $language = $this->getMockForAbstractClass('EnglishAbstract');
        } catch(\Exception $e) {
            //handle Exception, because there is a bug in PHPUnit until version
            // 3.5.4 who prevent mocking abstract class
            $this->markTestSkipped('Can\'t get mock from EnglishAbstract class');
        }
        
        $mappingVC = $language->getCVMapping();
        $this->assertEquals($mappingVC['y'], IndoAbstract::VOCAL);
        $this->assertNotEquals($mappingVC['y'], IndoAbstract::CONSONANT);
    }

}
