<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 22/03/15
 * Time: 13:29
 */

/**
 * Class TenancyModel
 */
class TenancyModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'tenancies';

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $propertyId;

    /**
     * @var string
     */
    private $dateFrom;

    /**
     * @var string
     */
    private $dateTo;

    /**
     * @var int
     */
    private $rateLandlordApproach;

    /**
     * @var int
     */
    private $rateQualityOfEquipment;

    /**
     * @var int
     */
    private $rateUtilityCharges;

    /**
     * @var int
     */
    private $rateBroadbandAccessibility;

    /**
     * @var int
     */
    private $rateNeighbours;

    /**
     * @var int
     */
    private $rateCarParkSpaces;

    /**
     * @var string
     */
    private $comment;

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
    private $updatedAt;

    /**
     * @var string
     */
    private $active;

    /**
     * Find all tenancies for property
     *
     * @param int $id
     * @return array
     */
    public function findForProperty($id)
    {
        $avgRate = 'CAST((t.rateLandlordApproach +
                    t.rateQualityOfEquipment +
                    t.rateUtilityCharges +
                    t.rateBroadbandAccessibility +
                    t.rateNeighbours +
                    t.rateCarParkSpaces) / 6 as DECIMAL(12, 2)) as avgRate';

        return $this->find(
            'YEAR(t.dateFrom) yearFrom, YEAR(t.dateTo) yearTo, t.*' . ', ' . $avgRate,
            'propertyId = :propertyId',
            [':propertyId' => $id]
        );
    }

    /**
     * @param int $userId
     * @return array
     */
    public function findAll($userId)
    {
        $query = "
            SELECT
              t.id,
              t.dateFrom,
              t.dateTo,
              t.rateLandlordApproach,
              t.rateQualityOfEquipment,
              t.rateUtilityCharges,
              t.rateBroadbandAccessibility,
              t.rateNeighbours,
              t.rateCarParkSpaces,
              CAST((t.rateLandlordApproach +
                    t.rateQualityOfEquipment +
                    t.rateUtilityCharges +
                    t.rateBroadbandAccessibility +
                    t.rateNeighbours +
                    t.rateCarParkSpaces) / 6 as DECIMAL(12, 2)) as avgRate,
              t.comment,
              concat(p.buildingNumber, ', ', p.street, ', ', p.city) as address
            FROM $this->table t
            JOIN properties p
            ON t.propertyId = p.id
            WHERE t.addedBy = $userId";

        return $this->select($query);
    }

    /**
     * Check same user has already entered tenancy
     * for same property within same time period
     *
     * @return bool
     */
    public function exists()
    {
        $where = implode(' AND ', [
            'addedBy = :addedBy',
            'propertyId = :propertyId',
            '((dateFrom <= :dateFrom AND dateTo >= :dateFrom) OR (dateFrom <= :dateTo AND dateTo >= :dateTo))'
        ]);

        $params = [
            ':addedBy'    => $this->addedBy,
            ':propertyId' => $this->propertyId,
            ':dateFrom'   => $this->dateFrom,
            ':dateTo'     => $this->dateTo,
        ];

        $result = $this->find('*', $where, $params);

        return count($result) > 0;
    }

    /**
     * Save new tenancy, here we are performing an "upsert".
     * If an id is set - then we are updating current record,
     * if not - then it's an insert of a new one.
     *
     * @return int
     */
    public function save()
    {
        if ($this->id) {

            return $this->update(
                implode(', ', [
                    'rateLandlordApproach = :rateLandlordApproach',
                    'rateQualityOfEquipment = :rateQualityOfEquipment',
                    'rateUtilityCharges = :rateUtilityCharges',
                    'rateBroadbandAccessibility = :rateBroadbandAccessibility',
                    'rateNeighbours = :rateNeighbours',
                    'rateCarParkSpaces = :rateCarParkSpaces',
                    'comment = :comment'
                ]),
                'id = :id',
                [
                    ':id'                         => $this->id,
                    ':rateLandlordApproach'       => $this->rateLandlordApproach,
                    ':rateQualityOfEquipment'     => $this->rateQualityOfEquipment,
                    ':rateUtilityCharges'         => $this->rateUtilityCharges,
                    ':rateBroadbandAccessibility' => $this->rateBroadbandAccessibility,
                    ':rateNeighbours'             => $this->rateNeighbours,
                    ':rateCarParkSpaces'          => $this->rateCarParkSpaces,
                    ':comment'                    => $this->comment,
                ]
            );
        }

        return $this->insert([
            ':propertyId'                 => $this->propertyId,
            ':dateFrom'                   => $this->dateFrom,
            ':dateTo'                     => $this->dateTo,
            ':rateLandlordApproach'       => $this->rateLandlordApproach,
            ':rateQualityOfEquipment'     => $this->rateQualityOfEquipment,
            ':rateUtilityCharges'         => $this->rateUtilityCharges,
            ':rateBroadbandAccessibility' => $this->rateBroadbandAccessibility,
            ':rateNeighbours'             => $this->rateNeighbours,
            ':rateCarParkSpaces'          => $this->rateCarParkSpaces,
            ':comment'                    => $this->comment,
            ':addedAt'                    => $this->addedAt,
            ':addedBy'                    => $this->addedBy,
            ':active'                     => $this->active,
        ]);
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
    public function getPropertyId()
    {
        return $this->propertyId;
    }

    /**
     * @param int $propertyId
     */
    public function setPropertyId($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    /**
     * @return string
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param string $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @return string
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * @param string $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
    }

    /**
     * @return int
     */
    public function getRateLandlordApproach()
    {
        return $this->rateLandlordApproach;
    }

    /**
     * @param int $rateLandlordApproach
     */
    public function setRateLandlordApproach($rateLandlordApproach)
    {
        $this->rateLandlordApproach = $rateLandlordApproach;
    }

    /**
     * @return int
     */
    public function getRateQualityOfEquipment()
    {
        return $this->rateQualityOfEquipment;
    }

    /**
     * @param int $rateQualityOfEquipment
     */
    public function setRateQualityOfEquipment($rateQualityOfEquipment)
    {
        $this->rateQualityOfEquipment = $rateQualityOfEquipment;
    }

    /**
     * @return int
     */
    public function getRateUtilityCharges()
    {
        return $this->rateUtilityCharges;
    }

    /**
     * @param int $rateUtilityCharges
     */
    public function setRateUtilityCharges($rateUtilityCharges)
    {
        $this->rateUtilityCharges = $rateUtilityCharges;
    }

    /**
     * @return int
     */
    public function getRateBroadbandAccessibility()
    {
        return $this->rateBroadbandAccessibility;
    }

    /**
     * @param int $rateBroadbandAccessibility
     */
    public function setRateBroadbandAccessibility($rateBroadbandAccessibility)
    {
        $this->rateBroadbandAccessibility = $rateBroadbandAccessibility;
    }

    /**
     * @return int
     */
    public function getRateNeighbours()
    {
        return $this->rateNeighbours;
    }

    /**
     * @param int $rateNeighbours
     */
    public function setRateNeighbours($rateNeighbours)
    {
        $this->rateNeighbours = $rateNeighbours;
    }

    /**
     * @return int
     */
    public function getRateCarParkSpaces()
    {
        return $this->rateCarParkSpaces;
    }

    /**
     * @param int $rateCarParkSpaces
     */
    public function setRateCarParkSpaces($rateCarParkSpaces)
    {
        $this->rateCarParkSpaces = $rateCarParkSpaces;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Calculate average rating for current tenancy
     *
     * @return float
     */
    public function getAverageRating()
    {
        return round(($this->rateBroadbandAccessibility + $this->rateCarParkSpaces + $this->rateLandlordApproach +
            $this->rateNeighbours + $this->rateQualityOfEquipment + $this->rateUtilityCharges) / 6, 2);
    }
}
