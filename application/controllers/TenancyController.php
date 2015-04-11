<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 22/03/15
 * Time: 13:10
 */

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

            $buildingNumber = $params['buildingNumber'];
            $street         = $params['street'];
            $city           = $params['city'];
            $county         = $params['county'];



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
}
