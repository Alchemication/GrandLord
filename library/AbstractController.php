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
     * @param string $type request type, use JSON for Ajax requests
     */
    protected function handleError(\Exception $e, $type = 'HTTP')
    {
        if (strtoupper($type) === 'JSON') {
            $this->sendJson($e->getMessage(), 500);
        }

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
     * Return data as Json
     *
     * @param mixed $data
     */
    protected function sendJson($data)
    {
        header("HTTP/1.1 200 OK");
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    /**
     * Escape value before dumping on the screen,
     * this prevents XSS attacks.
     * @see http://www.sitepoint.com/php-security-cross-site-scripting-attacks-xss/
     * @param string $string
     */
    protected function escape($string)
    {
        echo htmlspecialchars($string, ENT_QUOTES, 'utf-8');
    }

    /**
     * Load the view.
     * Use from the controller, example:
     * $this->loadView('about/index') // will load view views/about/index.php
     *
     * @param string $viewName
     * @param bool $loadHeader
     * @param bool $loadFooter
     * @param mixed $data
     */
    protected function loadView($viewName, $data = null, $loadHeader = true, $loadFooter = true)
    {
        /**
         * Keep track of viewName to activate active page in navbar
         */
        $currentView = $viewName;

        if ($data !== null) {
            extract($data);
        }

        if ($loadHeader) {
            include_once(ROOT . DS . 'application' . DS . 'views' . DS . 'default/header.php');
        }

        include_once(ROOT . DS . 'application' . DS . 'views' . DS . $viewName . '.php');

        if ($loadFooter) {
            include_once(ROOT . DS . 'application' . DS . 'views' . DS . 'default/footer.php');
        }
    }
}
