<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 07/02/15
 * Time: 20:37
 */

/**
 * Class AbstractController
 */
class AbstractController
{
    /**
     * Load the view.
     * Use from the controller, example:
     * $this->loadView('about/index') // will load view views/about/index.php
     *
     * @param string $viewName
     * @param mixed $data
     */
    protected function loadView($viewName, $data = null)
    {
        if ($data !== null) {
            extract($data);
        }

        include_once(ROOT . DS . 'application' . DS . 'views' . DS . $viewName . '.php');
    }
}
