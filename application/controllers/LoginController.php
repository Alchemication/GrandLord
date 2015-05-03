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
    public function indexAction() {
        // check if user already logged in
        if (isset($_SESSION['user_name'])) {
            // redirect to home page
            $this->redirect('home/index');
        } else {
            // display login page
            $this->loadView('login/index',['message' => ""]);
        }
    }


    /**
     * Log user out
     */
    public function logoutAction() {
        unset($_SESSION['user_name']);
        unset($_SESSION['first_name']);
        unset($_SESSION['user_id']);
        session_unset();
        session_destroy();
        $this->loadView('login/index', ['message' => ""]);
    }

    /**
     * Validate username and password
     */
    public function validateAction() {

        if (isset($_POST['username'], $_POST['password'])) {
            // retrieve user details
            $username = $this->testInputAction($_POST['username']);
            $password = $this->testInputAction($_POST['password']);
        }

        $errors = array();

        // check if all fields are filled correctly
        if (empty($username) || empty($password)) {
            $errors[] = "Username and password required.";
        }
        // validate length of the user input to match db structure
        if (strlen($username) > 255) {
            $errors[] = "Username field contains too many characters.";
        }

        if (empty($errors)) {
            try {
                $userModel = new UserModel($username, $password);
                // check with db if username and password match
                if ($foundUser = $userModel->findUser()) {
                    // user logged in successfully
                    $_SESSION['user_name'] = $userModel->getUsername();
                    $_SESSION['first_name'] = $foundUser[0]['firstName'];
                    $_SESSION['user_id'] = $foundUser[0]['id'];
                    // redirect to user tenancies
                    $this->redirect("tenancy/index");
                } else {
                    // display message
                    $message = "Incorrect details. Please try again.";
                    $this->loadView('login/index', ['message' => $message]);
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
            $this->loadView('login/index', ['message' => $message]);
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
