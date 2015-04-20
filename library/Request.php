<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 11/04/15
 * Time: 14:06
 */

/**
 * Class Request
 */
class Request
{
    /**
     * @return bool
     */
    public function isGet()
    {
        return isset($_GET) && count($_GET);
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return isset($_POST) && count($_POST);
    }

    /**
     * Get all $_GET or $_POST params
     *
     * @param string $mode get or post
     * @return mixed
     */
    public function getParams($mode = null)
    {
        if ($mode === 'post') {
            $params = $_POST;
        } else if ($mode === 'get') {
            $params = $_GET;
        } else {
            $params = $this->isPost() ? $_POST : $_GET;
        }

        // check if global XSS filtering must take place
        // before returning response
        if (GLOBAL_XSS_PROTECTION) {
            foreach ($params as $paramName => &$paramValue) {
                $paramValue = htmlentities(trim($paramValue), ENT_NOQUOTES, 'UTF-8');
            }
        }

        return $params;
    }

    /**
     * Get $_GET or $_POST param
     *
     * @param string $param
     * @param string $mode get or post
     * @return mixed
     */
    public function getParam($param, $mode = null)
    {
        $params = $this->getParams($mode);
        return $params[$param];
    }

    /**
     * Get as close to real as possible IP address
     *
     * @see http://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
     * @return string
     */
    public function getIpAddress()
    {
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        else if($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if($_SERVER['HTTP_X_FORWARDED'])
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        else if($_SERVER['HTTP_FORWARDED_FOR'])
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if($_SERVER['HTTP_FORWARDED'])
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        else if($_SERVER['REMOTE_ADDR'])
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipAddress = 'UNKNOWN';

        return $ipAddress;
    }
}
