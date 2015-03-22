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
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $buildingNumber;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $county;

    /**
     * @var string
     */
    private $city;

    /**
     * @var int
     */
    private $addedBy;

    /**
     * @var string
     */
    private $addedAt;

    /**
     * @var string
     */
    private $active;

    /**
     * Search for a property based on the term,
     * which represents partial address.
     * Results will be ordered by the most recent ones.
     *
     * This was a little bit tricky, this helped:
     * @see http://forums.mysql.com/read.php?107,113504,113504
     * and that:
     * @see http://forums.phpfreaks.com/topic/283379-pdo-mysql-fulltext-searches/
     *
     * @param string $term
     * @param int $limit Number of results returned
     * @return array
     */
    public function findByPartialAddress($term, $limit = 10)
    {
        if (!$term) {
            return [];
        }

        $data = [];

        $query  = "SELECT * FROM $this->table WHERE MATCH(street,county,city) AGAINST (:term IN BOOLEAN MODE) LIMIT $limit";
        $term   = $this->prepareSearchTerm($term);
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * @param int $buildingNumber
     */
    public function setBuildingNumber($buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param string $county
     */
    public function setCounty($county)
    {
        $this->county = $county;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getAddedBy()
    {
        return $this->addedBy;
    }

    /**
     * @param int $addedBy
     */
    public function setAddedBy($addedBy)
    {
        $this->addedBy = $addedBy;
    }

    /**
     * @return string
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * @param string $addedAt
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;
    }

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Save new property
     *
     * @return int
     */
    public function save()
    {
        return $this->insert([
            ':buildingNumber' => $this->buildingNumber,
            ':street'         => $this->street,
            ':county'         => $this->county,
            ':city'           => $this->city,
            ':addedBy'        => $this->addedBy,
            ':addedAt'        => $this->addedAt,
            ':active'         => $this->active,
        ]);
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
     * in order to achieve the most flexible functionality,
     * @see http://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
     * how prefixes work
     *
     * Example: "Douglas House" will need to become "+Douglas* +House*"
     *
     * @param string $term
     * @return string
     */
    private function prepareSearchTerm($term)
    {
        $terms = explode(' ', $term);

        $terms = array_map(function ($term) {
            if (!is_numeric($term)) { // make sure numbers are excluded, otherwise search won't work
                return $term;
            }
        }, $terms);

        return implode(' ', $terms);
    }
}
