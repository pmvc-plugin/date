<?php
namespace PMVC\PlugIn\date;

use PHPUnit_Framework_TestCase;

class DateTest extends PHPUnit_Framework_TestCase
{
    private $_plug = 'date';
    function testPlugin()
    {
        ob_start();
        print_r(\PMVC\plug($this->_plug));
        $output = ob_get_contents();
        ob_end_clean();
        $this->assertContains($this->_plug,$output);
    }

    function testGetSeqKeys()
    {
        $p = \PMVC\plug($this->_plug);
        $actual = $p->getSeqKeys(3, mktime(0, 0, 0, 2, 14, 2017));
        $expected = [
            [2017,2,14],
            [2017,2,13],
            [2017,2,12],
        ];
        $this->assertEquals($expected, $actual);
    }

}
