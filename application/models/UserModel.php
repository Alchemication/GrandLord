<?php
/**
 * Created by PhpStorm.
 * User: piotrbaran
 * Date: 24/02/2015
 * Time: 10:09
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
     * @var int
     */
    private $roleId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $secondName;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $active;


    /**
     * @param $username
     * @param $password
     * @param $roleId
     * @param $email
     * @param $firstName
     * @param $secondName
     * @param $createdAt
     * @param $updatedAt
     * @param $active
     */
    public function __construct($username, $password, $roleId=null, $email=null, $firstName=null, $secondName=null, $createdAt=null, $updatedAt=null, $active=null)
    {
        parent::__construct();

        $this->username = $username;
        $this->password = $password;
        $this->roleId = $roleId;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->active = $active;
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
     * @return string
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param string $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param string $secondName
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }




    /**
     * Retrieve user data by username and password
     *
     * @param UserModel $user
     * @return array
     */
    public function findUser(UserModel $user)
    {
        return $this->find('*','username = :username AND password = :password',[
            ':username' => $user->getUsername(), // bind username
            ':password' => $user->getPassword()  // bind password
        ]);
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
            ':password' => hash('sha512', $this->getPassword()),
            ':roleId' => $this->getRoleId(),
            ':email' => $this->getEmail(),
            ':firstName' => $this->getFirstName(),
            ':secondName' => $this->getSecondName(),
            ':createdAt' => $this->getCreatedAt(),
            ':updatedAt' => $this->getUpdatedAt(),
            ':active' => $this->getActive()
        ]);
    }


    /**
     * Retrieve user data by username
     *
     * @param UserModel $user
     * @return array
     */
    public function checkUserName(UserModel $user)
    {
        return $this->find("*",'username = :username', [
            ':username' => $user->getUsername() // bind username
        ]);
    }
}
