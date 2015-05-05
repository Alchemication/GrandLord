<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 15/02/15
 * Time: 12:09
 */

/**
 * Class ContactController
 */
class ContactController extends AbstractController
{

    public function indexAction()
    {

        // load view for contact page
        $message = "";
        $this->loadView('contact/index', ['message' => $message]);

    }

    /**
     * Validate that email field is not empty
     */
    public function validateAction()
    {

        if (!empty($_POST['inputEmail3'])) {
            // if not empty, display thankyou page

            //Email information
            $admin_email = "admin@grandlord.com";
            $subject = "Query From Grandlord Website";
            $name = $_POST['inputName3'];
            $email = $_POST['inputEmail3'];
            $phone = $_POST['inputPhone3'];
            $comment = $_POST['inputQuery3'];
            $query = $comment . " Contact number: " . $phone;

            //send email, this function will not work on local server
            mail($admin_email, $subject, $name,  $query,   "From:" . $email);

        echo "$query";

            $this->loadView('contact/thankyou');

        } else {
           // if email field is empty, display warning message
            $message = "Email address required.";
            $this->loadView('contact/index', ['message' => $message]);

            $this->loadView('contact/index');
        }

    }
}