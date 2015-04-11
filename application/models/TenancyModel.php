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
    private $active;

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
            '((dateFrom < :dateFrom AND dateTo > :dateFrom) OR (dateFrom < :dateTo AND dateTo > :dateTo))'
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
         * Save new tenancy
         *
         * @return int
         */
        public function save()
        {
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


}
