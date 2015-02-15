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
    /**
     * Display all contacts
     */
    public function displayAction()
    {
        try {
            // instantiate model, this will connect to db
            $contactModel = new ContactModel();

            // retrieve all contacts from db
            $allContacts = $contactModel->find();

            // load view and pass data into it
            $this->loadView('contact/display', ['contacts' => $allContacts]);

        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page
            $this->handleError($e);
        }
    }
}
