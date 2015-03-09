<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 08/03/15
 * Time: 11:34
 */

/**
 * Class PropertyModel
 */
class PropertyModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'properties';

    /**
     * Search for a property based on the term,
     * which represents partial address
     *
     * This was a little bit tricky, this helped:
     * @see http://forums.mysql.com/read.php?107,113504,113504
     * and that:
     * @see http://forums.phpfreaks.com/topic/283379-pdo-mysql-fulltext-searches/
     *
     * @param string $term
     * @return array
     */
    public function findByPartialAddress($term)
    {
        if (!$term) {
            return [];
        }

        $data = [];

        $query  = "SELECT * FROM $this->table WHERE MATCH(street,county,city) AGAINST (:term IN BOOLEAN MODE)";
        $term   = $this->prepareTerm($term);
        $params = [':term' => $term];

        // get the results
        $results =  $this->select($query, $params);

        // create results in the required format
        foreach ($results as $result) {
            $data[] = [
                'value' => $this->stringifyAddress($result),
                'raw'   => $result
            ];
        }

        return $data;
    }

    /**
     * Turn property result into string with human readable address
     *
     * @param array $property
     * @return string
     */
    private function stringifyAddress(array $property)
    {
        return $property['buildingNumber'] . ', ' . ucfirst($property['street']) . ', ' . ucfirst($property['city']);
    }

    /**
     * We need to prefix words with + and suffix with *
     * in order to achieve the most flexible functionality.
     *
     * Example: "Douglas House" will need to become "+Douglas* +House*",
     * MySQL will understand that and help with the task
     *
     * @param string $term
     * @return string
     */
    private function prepareTerm($term)
    {
        $terms = explode(' ', $term);

        $terms = array_map(function ($term) {
            if (!is_numeric($term)) { // make sure numbers are excluded, otherwise search won't work
                return '+' . $term . '*';
            }
        }, $terms);

        return implode(' ', $terms);
    }
}
