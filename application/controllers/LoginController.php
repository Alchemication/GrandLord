<?php
/**
 * Created by PhpStorm.
 * User: piotrbaran
 * Date: 24/02/2015
 * Time: 10:10
 */

/**
 * Class LoginController
 */
class LoginController extends AbstractController
{
    /**
     * Show default login page
     */
    public function indexAction()
    {
        $this->loadView('login/index',['message' => ""]);
    }

    /**
     * Show thank you page
     */
    public function thankYouAction()
    {
        $this->loadView('login/thankYou');
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


        try {
            // check with db
            $userModel = new UserModel($username, $password);

            //print_r($userModel);
            $foundUser = $userModel->findUser($userModel);

            if ($foundUser != null) {
                // @todo

                $this->thankYouAction();

            } else {
                // @todo
                $message = "Incorrect details. Please try again.";
                $this->loadView('login/index', ['user' => $userModel, 'message' => $message]);
            }

            //print_r($foundUser);


        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page

            $this->handleError($e);
        }


        // redirect to home on success or back to login/index
        // on failure

    }
}
