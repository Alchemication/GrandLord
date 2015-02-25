<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 18/02/15
 * Time: 19:41
 */

/**
 * Class UserModel
 */
class UserModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;





    /**
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        parent::__construct();

        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Retrieve user data by username and password
     *
     * @param UserModel $user
     * @return array
     */
    public function findUser(UserModel $user)
    {
        return $this->find([
            ':userName' => $user->getUsername(), // bind username
            ':password' => $user->getPassword()  // bind password
        ], 'username = :userName AND password = :password'); // where clause
    }

    /**
     * Retrieve user data by username
     *
     * @param UserModel $user
     * @return array
     */
    public function checkUserName(UserModel $user)
    {
        return $this->find([
            ':userName' => $user->getUsername(), // bind username
        ], 'username = :userName'); // where clause
    }


    /**
     * Save new user
     *
     * @return int
     */
    public function save()
    {
        return $this->insert([
            ':username' => $this->getUsername(),
            ':password' => hash('sha512', $this->getPassword())
        ]);
    }


}
