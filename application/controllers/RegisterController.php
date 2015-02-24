<?php
/**
 * Created by PhpStorm.
 * User: piotrbaran
 * Date: 24/02/2015
 * Time: 10:08
 */

/**
 * Class RegisterController
 */
class RegisterController extends AbstractController
{
    /**
     * Show default register page
     */
    public function indexAction()
    {
        $this->loadView('register/index');
    }

    /**
     * Validate username and password and redirect to home on success
     */
    public function validateAction()
    {
        // retrieve username
        $username = $_POST['username'];

        // validate username
        // @todo

        // retrieve password
        $password = $_POST['password'];

        // validate password
        // @todo

        // retrieve firstName
        $password = $_POST['firstName'];

        // validate firstName
        // @todo

        // retrieve lastName
        $password = $_POST['lastName'];

        // validate lastName
        // @todo


        try {
            // check with db if userName is already in use
            $userModel = new UserModel($username, $password);

            $foundUser = $userModel->checkUserName($userModel);


            if ($foundUser == null) {
                echo 'user not found, good to add new user </br>';
                // @todo

            } else {
                echo 'user name already in use </br>';
                // @todo

            }

            print_r($foundUser);

        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page
            $this->handleError($e);
        }


        // redirect to home on success or back to register/index
        // on failure

    }
}
