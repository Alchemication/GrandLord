<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 11/04/15
 * Time: 12:29
 */

class AppModel extends AbstractModel
{
    protected $table = 'lookups';

    /**
     * Get all lookups like countries, cities, streets etc.
     * in a nice format, like:
     * city: ['Cork', 'Dublin'],
     * county: ['Cork', 'Derry']
     *
     * @return array
     */
    public function getLookups()
    {
        $result  = [];
        $lookups = $this->find();

        foreach ($lookups as $lookup) {

            $lookupType = $lookup['lookupType'];

            if (!isset($result[$lookupType])) {
                $result[$lookupType] = [];
            }

            $result[$lookupType][] = $lookup['lookupValue'];
        }

        return $result;
    }
}
