<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 07/02/15
 * Time: 20:36
 */

/**
 * Class HomeController
 */
class HomeController extends AbstractController
{
    /**
     * Load home view
     */
    public function indexAction()
    {
        $this->loadView('home/index');
    }
}
