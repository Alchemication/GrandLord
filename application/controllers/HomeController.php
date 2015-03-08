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

    /**
     * Search for properties in the database
     * based on the user's search term
     */
    public function searchAction()
    {
        // get search term from URL
        $term = isset($_GET['term']) && $_GET['term'] ? $_GET['term'] : '';

        // find properties
        $propertyModel = new PropertyModel();
        $properties    = $propertyModel->findByPartialAddress($term);

        // send back response
        $this->sendJson($properties);
    }
}
