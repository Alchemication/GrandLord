<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16/02/2015
 * Time: 22:35
 */

class TemplateController extends AbstractController {

    // Display template website content

    public function indexAction()
    {
        try {

            // load view
            $this->loadView('template/index');

        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page
            $this->handleError($e);
        }
    }
}