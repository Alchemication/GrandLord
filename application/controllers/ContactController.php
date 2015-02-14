<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/02/2015
 * Time: 21:35
 */

class ContactController extends AbstractController {

    public function indexAction()
    {
    $this->loadView('contact/index');
    }

}