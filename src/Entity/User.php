<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="_user")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    // add your own fields
    /**
     * @var string
     * @ORM\Column(length=64,unique=true)
     */

    private $username;

    /**
     * @var string
     * @ORM\Column(length=256)
     */

    private $password;


    public function getRoles()
    {
        return ['ROLE_USER'];

    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;

    }

    public function getUsername()
    {
       return $this->username;
    }

    public function eraseCredentials()
    {

    }

    /**
     * @param string $username
     *
     */

    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     *
     */

    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }


    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);

    }

    public function getEmail()
    {
        return "{$this->username}xxx@uco.es";
    }

    public function __toString()
    {
        return $this->username;
    }
}
