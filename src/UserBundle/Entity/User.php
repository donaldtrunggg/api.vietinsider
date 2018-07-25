<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 *
 * @ORM\Table(name="tbluser_info")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   * @ORM\Column(name="username", type="string", length=255, nullable=false)
   */
  protected $username;

  /**
   * @var string
   * @ORM\Column(name="email", type="string", length=255, nullable=true)
   */
  protected $email;

  /**
   * @var string
   * @ORM\Column(name="fullName", type="string", length=255, nullable=true)
   */
  protected $fullName;
  /**
   * @var string
   * @ORM\Column(name="password", type="string", length=255, nullable=false)
   */
  protected $password;
  /**
   * @var string
   */
  protected $plainPassword;
  /**
   * @var string
   * @ORM\Column(name="salt", type="string", length=255, nullable=true)
   */
  protected $salt;
  /**
   * @var \DateTime
   * @ORM\Column(name="lastLogin", type="datetime", length=255, nullable=true)
   */
  protected $lastLogin;
  /**
   * @var boolean
   * @ORM\Column(name="isEnabled", type="smallint", nullable=true, columnDefinition="TINYINT(1) DEFAULT 0")
   */
  protected $isEnabled;
  /**
   * @var boolean
   * @ORM\Column(name="isLooked", type="smallint", nullable=true, columnDefinition="TINYINT(1) DEFAULT 0")
   */
  protected $isLooked;
  /**
   * @var boolean
   * @ORM\Column(name="isExpired", type="smallint", nullable=true, columnDefinition="TINYINT(1) DEFAULT 0")
   */
  protected $isExpired;
  /**
   * @var \DateTime
   * @ORM\Column(name="expiredOn", type="datetime", nullable=true)
   */
  protected $expiresAt;

  /**
   * @var int
   *
   * @ORM\Column(name="typelogin", type="integer")
   */
  private $typelogin;

  /**
   * @var \DateTime
   * @ORM\Column(name="createdOn", type="datetime", nullable=true)
   */
  protected $createdDate;
  /**
   * @var \DateTime
   * @ORM\Column(name="updatedOn", type="datetime", nullable=true)
   */
  protected $lastUpdatedDate;

  public function __construct()
  {
    $this->salt = null;
    $this->isEnabled = false;
    $this->isLooked = false;
    $this->isExpired = false;

    $currentDate = new \DateTime();
    $this->createdDate = $currentDate;
    $this->lastUpdatedDate = $currentDate;
    $this->lastLogin = $currentDate;
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
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param string $email
   * @return $this
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * @return string
   */
  public function getFullName()
  {
    return $this->fullName;
  }

  /**
   * @param string $fullName
   * @return $this
   */
  public function setFullName($fullName)
  {
    $this->fullName = $fullName;

    return $this;
  }

  /**
   * @return string
   */
  public function getPlainPassword()
  {
    return $this->plainPassword;
  }

  /**
   * @param string $plainPassword
   * @return $this
   */
  public function setPlainPassword($plainPassword)
  {
    $this->plainPassword = $plainPassword;

    return $this;
  }

  /**
   * @param string $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * @return \DateTime
   */
  public function getLastLogin()
  {
    return $this->lastLogin;
  }

  /**
   * @param \DateTime $lastLogin
   * @return $this
   */
  public function setLastLogin($lastLogin)
  {
    $this->lastLogin = $lastLogin;

    return $this;
  }

  /**
   * @param boolean $isEnabled
   * @return $this
   */
  public function setEnabled($isEnabled)
  {
    $this->isEnabled = $isEnabled;

    return $this;
  }

  /**
   * @return boolean
   */
  public function isLooked()
  {
    return $this->isLooked;
  }

  /**
   * @param boolean $isLooked
   * @return $this
   */
  public function setLooked($isLooked)
  {
    $this->isLooked = $isLooked;

    return $this;
  }

  /**
   * @return boolean
   */
  public function isExpired()
  {
    return $this->isExpired;
  }

  /**
   * @param boolean $isExpired
   * @return $this
   */
  public function setExpired($isExpired)
  {
    $this->isExpired = $isExpired;

    return $this;
  }

  /**
   * @return \DateTime
   */
  public function getExpiresAt()
  {
    return $this->expiresAt;
  }

  /**
   * @param \DateTime $expiresAt
   * @return $this
   */
  public function setExpiresAt($expiresAt)
  {
    $this->expiresAt = $expiresAt;

    return $this;
  }

  /**
   * @return \DateTime
   */
  public function getCreatedDate()
  {
    return $this->createdDate;
  }

  /**
   * @param \DateTime $createdDate
   * @return $this
   */
  public function setCreatedDate($createdDate)
  {
    $this->createdDate = $createdDate;

    return $this;
  }

  /**
   * @return \DateTime
   */
  public function getLastUpdatedDate()
  {
    return $this->lastUpdatedDate;
  }

  /**
   * @param \DateTime $lastUpdatedDate
   * @return $this
   */
  public function setLastUpdatedDate($lastUpdatedDate)
  {
    $this->lastUpdatedDate = $lastUpdatedDate;

    return $this;
  }

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return int
   */
  public function getTypelogin()
  {
    return $this->typelogin;
  }

  /**
   * @param int $typelogin
   */
  public function setTypelogin($typelogin)
  {
    $this->typelogin = $typelogin;
  }


  /**
   * Checks whether the user's account has expired.
   *
   * Internally, if this method returns false, the authentication system
   * will throw an AccountExpiredException and prevent login.
   *
   * @return bool true if the user's account is non expired, false otherwise
   *
   * @see AccountExpiredException
   */
  public function isAccountNonExpired()
  {
    if (true === $this->isExpired) {
      return false;
    }

    if (null !== $this->expiresAt && $this->expiresAt->getTimestamp() < time()) {
      return false;
    }

    return true;
  }

  /**
   * Checks whether the user is locked.
   *
   * Internally, if this method returns false, the authentication system
   * will throw a LockedException and prevent login.
   *
   * @return bool true if the user is not locked, false otherwise
   *
   * @see LockedException
   */
  public function isAccountNonLocked()
  {
    return !$this->isLooked;
  }

  /**
   * Checks whether the user's credentials (password) has expired.
   *
   * Internally, if this method returns false, the authentication system
   * will throw a CredentialsExpiredException and prevent login.
   *
   * @return bool true if the user's credentials are non expired, false otherwise
   *
   * @see CredentialsExpiredException
   */
  public function isCredentialsNonExpired()
  {
    return true;
  }

  /**
   * Checks whether the user is enabled.
   *
   * Internally, if this method returns false, the authentication system
   * will throw a DisabledException and prevent login.
   *
   * @return bool true if the user is enabled, false otherwise
   *
   * @see DisabledException
   */
  public function isEnabled()
  {
    return $this->isEnabled;
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
      $this->password,
      $this->salt,
      $this->username,
      $this->isExpired,
      $this->isLooked,
      $this->isEnabled,
      $this->id,
      $this->expiresAt,
      $this->email,
      $this->typelogin,
      $this->createdDate,
      $this->lastUpdatedDate
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
    $data = unserialize($serialized);
    // add a few extra elements in the array to ensure that we have enough keys when unserializing
    // older data which does not include all properties.
    $data = array_merge($data, array_fill(0, 2, null));

    list(
      $this->password,
      $this->salt,
      $this->username,
      $this->isExpired,
      $this->isLooked,
      $this->isEnabled,
      $this->id,
      $this->expiresAt,
      $this->email,
      $this->typelogin,
      $this->createdDate,
      $this->lastUpdatedDate
      ) = $data;
  }

  /**
   * Returns the roles granted to the user.
   *
   * <code>
   * public function getRoles()
   * {
   *     return array('ROLE_USER');
   * }
   * </code>
   *
   * Alternatively, the roles might be stored on a ``roles`` property,
   * and populated in any number of different ways when the user object
   * is created.
   *
   * @return Role[] The user roles
   */
  public function getRoles()
  {
    return array('ROLE_USER');
  }

  /**
   * Returns the password used to authenticate the user.
   *
   * This should be the encoded password. On authentication, a plain-text
   * password will be salted, encoded, and then compared to this value.
   *
   * @return string The password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Returns the salt that was originally used to encode the password.
   *
   * This can return null if the password was not encoded using a salt.
   *
   * @return string|null The salt
   */
  public function getSalt()
  {
    return null;
  }

  /**
   * Returns the username used to authenticate the user.
   *
   * @return string The username
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Removes sensitive data from the user.
   *
   * This is important if, at any given point, sensitive information like
   * the plain-text password is stored on this object.
   */
  public function eraseCredentials()
  {
    $this->plainPassword = null;
  }
}

