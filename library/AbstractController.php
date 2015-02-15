<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 07/02/15
 * Time: 20:37
 */

/**
 * Class AbstractController
 */
abstract class AbstractController
{
    /**
     * Redirect to path
     *
     * @param string $location
     */
    protected function redirect($location)
    {
        redirect($location);
    }

    /**
     * Default error handling
     *
     * @param Exception $e
     */
    protected function handleError(\Exception $e)
    {
        $errorInfo     = [];
        $exceptionType = get_class($e);

        switch ($exceptionType) {

            case 'PDOException':
                $errorInfo['code'] = $e->getCode();
                $errorInfo['msg']  = 'Database Error';

                break;

            default:

                $errorInfo['code'] = $e->getCode();
                $errorInfo['msg']  = $e->getMessage();

        }

        $this->loadView('default/error', ['error' => $errorInfo]);
    }

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
