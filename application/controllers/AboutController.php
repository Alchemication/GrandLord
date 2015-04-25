<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22/04/2015
 * Time: 19:39
 */
class AboutController extends AbstractController {

    // Display template website content

    public function indexAction()
    {
        try {

            // load view
            $this->loadView('about/index');

        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page
            $this->handleError($e);
        }
    }
}