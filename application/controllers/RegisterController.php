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
        $this->loadView('register/index',['user' => null,'message' => ""]);
    }

    /**
     * Show thank you page
     */
    public function thankYouAction()
    {
        $this->loadView('register/thankYou');
    }


    /**
     * Validate username and all details and redirect to home on success
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

        // retrieve email
        $email = $_POST['email'];
        // validate email
        // @todo

        // retrieve firstName
        $firstName = $_POST['firstName'];
        // validate firstName
        // @todo

        // retrieve lastName
        $secondName = $_POST['secondName'];
        // validate lastName
        // @todo

        // retrieve accountType
        $roleId = $_POST['roleId'];
        // validate accountType
        // @todo



        try {
            // check with db if username is already in use
            $date = date('Y-m-d H:i:s');
            $active = "y";
            $userModel = new UserModel($username, $password, $roleId, $email, $firstName, $secondName, $date, $date, $active);

            //print_r($userModel);
            $foundUser = $userModel->checkUserName($userModel);

            if ($foundUser == null) {
                // @todo

                $numberOfRowsAdded = $userModel->save();

                if ($numberOfRowsAdded >= 1) {
                    $this->thankYouAction();
                }

            } else {
                // @todo
                $message = "Username \"" . $userModel->getUserName() . "\" is already taken. Please try again.";
                $this->loadView('register/index', ['user' => $userModel, 'message' => $message]);
            }

            //print_r($foundUser);

        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page
            $this->handleError($e);
        }


        // redirect to home on success or back to register/index
        // on failure

    }
}
