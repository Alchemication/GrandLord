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
     * @var Request
     */
    private $request;

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
     * Get access to $_GET and $_POST super globals,
     * please always use this class as it will contain all
     * required security mechanisms.
     * Singleton.
     *
     * @return Request
     */
    protected function getRequest()
    {
        if (!$this->request) {
            $this->request = new Request();
        }

        return $this->request;
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

                break;
        }

        $this->loadView('default/error', ['error' => $errorInfo]);
        exit();
    }

    /**
     * @param mixed $errors
     */
    protected function handleJsonError($errors)
    {
        if (!is_array($errors)) {
            $errors = [$errors];
        }

        $this->sendJson(['status' => 'error', 'errors' => $errors]);
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
     * Load the view.
     * Use from the controller, example:
     * $this->loadView('about/index') // will load view views/about/index.php
     *
     * @param string $viewName
     * @param bool $loadHeader
     * @param bool $loadFooter
     * @param bool $loginStatus
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
