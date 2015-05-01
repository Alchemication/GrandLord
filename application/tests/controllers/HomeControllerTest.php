<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 19/04/15
 * Time: 12:31
 */

class HomeControllerTest extends PHPUnit_Extensions_Selenium2TestCase
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
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser('*firefox');
        $this->setBrowserUrl('http://localhost/Grandlord/'); // set website being tested
    }

    public function testTitle()
    {
        $this->url('home/index'); // open the home page
        $this->assertEquals('Grandlord', $this->title());
    }

    public function testCanSeeEmptySearchTextBox()
    {
        $this->url('home/index'); // open the home page

        // find input box
        $textBox = $this->byId('search-text-box');

        // assert it's initially empty
        $this->assertEquals('', $textBox->attribute('value'));
    }

    public function testCanFillOutSearchInputTextbox()
    {
        $this->url('home/index'); // open the home page

        // fill out input box
        $this->byId('search-text-box')->value('41 Douglas house');

        // wait max 5 secs for results
        $this->waitUntil(function () {
            if ($this->byCssSelector('span.twitter-typeahead')) {
                return true;
            }
            return false;
        }, 5000);
    }
}
