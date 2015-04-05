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
    private $rateContactWithLandlord;

    /**
     * @var int
     */
    private $rateFlatQuality;

    /**
     * @var int
     */
    private $rateCleanliness;

    /**
     * @var int
     */
    private $ratePropertyState;

    /**
     * @var int
     */
    private $rateAvg;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
    public function getRateContactWithLandlord()
    {
        return $this->rateContactWithLandlord;
    }

    /**
     * @param int $rateContactWithLandlord
     */
    public function setRateContactWithLandlord($rateContactWithLandlord)
    {
        $this->rateContactWithLandlord = $rateContactWithLandlord;
    }

    /**
     * @return int
     */
    public function getRateFlatQuality()
    {
        return $this->rateFlatQuality;
    }

    /**
     * @param int $rateFlatQuality
     */
    public function setRateFlatQuality($rateFlatQuality)
    {
        $this->rateFlatQuality = $rateFlatQuality;
    }

    /**
     * @return int
     */
    public function getRateCleanliness()
    {
        return $this->rateCleanliness;
    }

    /**
     * @param int $rateCleanliness
     */
    public function setRateCleanliness($rateCleanliness)
    {
        $this->rateCleanliness = $rateCleanliness;
    }

    /**
     * @return int
     */
    public function getRatePropertyState()
    {
        return $this->ratePropertyState;
    }

    /**
     * @param int $ratePropertyState
     */
    public function setRatePropertyState($ratePropertyState)
    {
        $this->ratePropertyState = $ratePropertyState;
    }

    /**
     * @return int
     */
    public function getRateAvg()
    {
        return $this->rateAvg;
    }

    /**
     * @param int $rateAvg
     */
    public function setRateAvg($rateAvg)
    {
        $this->rateAvg = $rateAvg;
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
