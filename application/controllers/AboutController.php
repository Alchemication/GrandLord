<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 11/02/15
 * Time: 18:03
 */

class AboutController extends AbstractController
{
    /**
     * Sample action:
     *      1. look at URL
     *      2. load controller
     *      3. get data from model
     *      4. load view and pass it the data
     */
    public function indexAction()
    {
        $namesModel = new NamesModel();
        $names = $namesModel->getNames();

        $this->loadView('about/index', ['names' => $names]);
    }
}
