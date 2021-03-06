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
class RegisterController extends AbstractController {
    /**
     * Show default register page
     */
    public function indexAction() {
        // check if user already logged in
        if (isset($_SESSION['user_name'])) {
            // redirect to home page
            $this->redirect('home/index');
        } else {
            // display register page
            $this->loadView('register/index',['user' => null,'message' => ""]);
        }
    }


    /**
     * Validate username and all details
     */
    public function validateAction() {

        if (isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['firstName'], $_POST['secondName'])) {
            // retrieve user details
            $username = $this->testInputAction($_POST['username']);
            $password = $this->testInputAction($_POST['password']);
            $email = $this->testInputAction($_POST['email']);
            $firstName = $this->testInputAction($_POST['firstName']);
            $secondName = $this->testInputAction($_POST['secondName']);
            $roleId = 1; // account type - tenant
        }

        $errors = array();

        // check if all fields are filled correctly
        if (empty($username) || empty($password) || empty($email) || empty($firstName) || empty($secondName) ) {
            $errors[] = "All fields required.";
        }
        // validate email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false ) {
            $errors[] = "Email address not valid.";
        }
        // validate length of the user input to match db structure
        if (strlen($username) > 255 || strlen($email) > 255 || strlen($firstName) > 255 || strlen($secondName) > 255) {
            $errors[] = "One or more fields contains too many characters.";
        }

        if (empty($errors)) {
            try {
                $date = date('Y-m-d H:i:s');
                $active = "y";
                $userModel = new UserModel($username, $password, $roleId, $email, $firstName, $secondName, $date, $date, $active);
                // check with db if username is already in use
                if (!($userModel->userExists($username))) {
                    // register new user
                    if (($lastInsertId = $userModel->save()) > 0) {
                        $_SESSION['user_name'] = $userModel->getUsername();
                        $_SESSION['first_name'] = $userModel->getFirstName();
                        $_SESSION['user_id'] = $lastInsertId;
                        // redirect to user tenancies
                        $this->redirect("/tenancy/index");
                    }
                } else {
                    // display message
                    $message = "Username \"" . $userModel->getUserName() . "\" is already in use. Please try again.";
                    $this->loadView('register/index', ['user' => $userModel, 'message' => $message]);
                }
            } catch (Exception $e) {
                // on any exception - apply global error handler,
                // and display default error page
                $this->handleError($e);
            }
        } else {
            // display error message(s)
            $message = "";
            foreach ($errors as $error) {
                $message .= $error . "<br/>";
            }
            $userModel = new UserModel($username, $password, $roleId, $email, $firstName, $secondName);
            $this->loadView('register/index', ['user' => $userModel, 'message' => $message]);
        }

    }

    /**
     * Validate user input
     *
     * @param string
     * @return string
     */
    public function testInputAction($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
