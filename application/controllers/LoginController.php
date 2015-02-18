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
}
