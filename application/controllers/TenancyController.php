<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 22/03/15
 * Time: 13:10
 */

use Respect\Validation\Validator as v;

/**
 * Class TenancyController
 */
class TenancyController extends AbstractController
{
    /**
     * Display list of tenancies added by logged in user
     */
    public function indexAction()
    {
        $loggedInUserId = 1;

        try {
            $tenancyModel = new TenancyModel();
            $myTenancies  = $tenancyModel->find('*', 'id = :id', [':id' => $loggedInUserId]);
        } catch (\Exception $e) {
            $this->handleError($e);
        }

        $this->loadView('tenancy/index', ['tenancies' => $myTenancies]);
    }

    /**
     * Add new tenancy
     */
    public function addAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $params = $request->getParams();

            // validate params, this will exit and send errors if any detected
            $params = $this->validateParams($params);

            // input validation passed the tests

            try {
                $tenancy = new TenancyModel();
                $tenancy->setPropertyId($params['propertyId']);
                $tenancy->setDateFrom($params['dateFrom']);
                $tenancy->setDateTo($params['dateTo']);
                $tenancy->setRateLandlordApproach($params['rateLandlordApproach']);
                $tenancy->setRateQualityOfEquipment($params['rateQualityOfEquipment']);
                $tenancy->setRateUtilityCharges($params['rateUtilityCharges']);
                $tenancy->setRateBroadbandAccessibility($params['rateBroadbandAccessibility']);
                $tenancy->setRateNeighbours($params['rateNeighbours']);
                $tenancy->setRateCarParkSpaces($params['rateCarParkSpaces']);
                $tenancy->setComment($params['comment']);
                $tenancy->setAddedBy(1);

                // now check if tenancy already exist for
                // this property within this time period
                if ($tenancy->exists()) {
                    $this->handleJsonError(sprintf('Your stay at this place between %s and %s has already been registered',
                        $params['dateFrom'], $params['dateTo']));
                }

                // tenancy is good to be saved into the db
                $tenancy->setAddedAt(date(MYSQL_DATE_TIME_FORMAT));
                $tenancy->setActive('y');
                $tenancy->save();
            } catch (\Exception $e) {
                $this->handleJsonError($e->getMessage());
            }

            // return JSON response
            $this->sendJson([
                'status'   => 'ok',
                'msg'      => 'Tenancy added successfully'
            ]);
        }

        // get lookup values
        try {
            $appModel = new AppModel();
            $lookups  = $appModel->getLookups();
        } catch (\Exception $e) {
            $this->handleError($e);
        }

        $this->loadView('tenancy/add', ['lookups' => $lookups]);
    }

    /**
     * Remove existing tenancy
     */
    public function removeAction()
    {

    }

    /**
     * Edit existing tenancy
     */
    public function editAction()
    {

    }

    /**
     * @param array $params
     * @return array
     */
    private function validateParams(array $params)
    {
        $errors = [];

        if (!v::int()->notEmpty()->min(1)->validate($params['propertyId'])) {
            $errors[] = 'Property id must be a number';
        }

        if (!v::string()->notEmpty()->length(24, 24)->contains(' to ')->validate($params['fromTo'])) {
            $errors[] = 'Date from to should contain word "to" and 24 characters in total';
        }

        if (!v::int()->notEmpty()->between(1, 5, true)->validate($params['rateLandlordApproach'])) {
            $errors[] = 'Ratings must be numbers from 1 to 5 (rateLandlordApproach)';
        }

        if (!v::int()->notEmpty()->between(1, 5, true)->validate($params['rateQualityOfEquipment'])) {
            $errors[] = 'Ratings must be numbers from 1 to 5 (rateQualityOfEquipment)';
        }

        if (!v::int()->notEmpty()->between(1, 5, true)->validate($params['rateUtilityCharges'])) {
            $errors[] = 'Ratings must be numbers from 1 to 5 (rateUtilityCharges)';
        }

        if (!v::int()->notEmpty()->between(1, 5, true)->validate($params['rateBroadbandAccessibility'])) {
            $errors[] = 'Ratings must be numbers from 1 to 5 (rateBroadbandAccessibility)';
        }

        if (!v::int()->notEmpty()->between(1, 5, true)->validate($params['rateNeighbours'])) {
            $errors[] = 'Ratings must be numbers from 1 to 5 (rateNeighbours)';
        }

        if (!v::int()->notEmpty()->between(1, 5, true)->validate($params['rateCarParkSpaces'])) {
            $errors[] = 'Ratings must be numbers from 1 to 5 (rateCarParkSpaces)';
        }

        if (!v::string()->validate($params['comment'])) {
            $errors[] = 'Comment should contain at minimum 10 characters';
        }

        if (count($errors)) {
            $this->handleJsonError($errors);
        }

        // now we can fogure out the fromTo dates
        $fromTo = explode(' to ', $params['fromTo']);
        $params['dateFrom'] = $fromTo[0];
        $params['dateTo']   = $fromTo[1];
        unset($params['fromTo']);

        // and we can validate dates as well
        if (!v::string()->date(MYSQL_DATE_FORMAT)->validate($params['dateFrom'])) {
            $errors[] = 'Date from should be in YYYY-MM-DD format';
        }

        if (!v::string()->date(MYSQL_DATE_FORMAT)->validate($params['dateTo'])) {
            $errors[] = 'Date to should be in YYYY-MM-DD format';
        }

        if (count($errors)) {
            $this->handleJsonError($errors);
        }

        return $params;
    }
}
