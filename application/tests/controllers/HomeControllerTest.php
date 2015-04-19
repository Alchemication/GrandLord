<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 19/04/15
 * Time: 12:31
 */

class HomeControllerTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        /**
         * '*firefox' => Firefox 1 or 2
         * '*iexplore' => Internet Explorer (all)
         * '*custom /path/to/browser/binary => Other browsers (incl. Firefox on Linux)
         * '*iehta' => Experimental Embedded IE
         * '*chrome' => Experimental Firefox profile
         */
        $this->setBrowser('*chrome');
        $this->setBrowserUrl('http://localhost/Grandlord/'); // set website being tested
    }

    public function testTitle()
    {
        $this->open('http://localhost/Grandlord/home/index'); // open the index page
        $this->assertTitle('Grandlord');
    }
}
