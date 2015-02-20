<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 18/02/15
 * Time: 19:20
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
        $this->loadView('login/index');
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

            $foundUser = $userModel->findUser($userModel);

            echo 'result:';
            print_r($foundUser);

        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page

            $this->handleError($e);
        }


        // redirect to home on success or back to login/index
        // on failure

    }
}
