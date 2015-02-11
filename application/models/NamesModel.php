<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 11/02/15
 * Time: 18:23
 */

/**
 * Class NamesModel
 */
class NamesModel extends AbstractModel
{
    /**
     * @return array
     */
    public function getNames()
    {
        return [
            ['firstName' => 'A', 'lastName' => 'N'],
            ['firstName' => 'G', 'lastName' => 'J'],
            ['firstName' => 'B', 'lastName' => 'B'],
        ];
    }
}
