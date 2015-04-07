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
        // check if user already logged in
        if (isset($_SESSION['user_name'])) {
            // display user tenancies
            $loggedInUserId = 1;

            $tenancyModel = new TenancyModel();
            $myTenancies  = $tenancyModel->find('*', 'id = :id', [':id' => $loggedInUserId]);

            $this->loadView('tenancy/index', ['tenancies' => $myTenancies]);
        } else {
            // display login page
            $message = "Please login to view your tenancies.";
            $this->loadView('login/index',['message' => $message]);
        }
        /*
        $loggedInUserId = 1;

        $tenancyModel = new TenancyModel();
        $myTenancies  = $tenancyModel->find('*', 'id = :id', [':id' => $loggedInUserId]);

        $this->loadView('tenancy/index', ['tenancies' => $myTenancies]);
        */
    }

    /**
     * Add new tenancy
     */
    public function addAction()
    {
        $this->loadView('tenancy/add');
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
