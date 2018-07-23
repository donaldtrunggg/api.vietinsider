<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistrationInfo
 *
 * @ORM\Table(name="registration_info")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\RegistrationInfoRepository")
 */
class RegistrationInfo
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="username", type="string", length=255, unique=true)
   * @ORM\OneToOne(targetEntity="Login", mappedBy="uid")
   */
  private $username;

  /**
   * @var string
   *
   * @ORM\Column(name="password", type="string", length=255)
   */
  private $password;

  /**
   * @var string
   *
   * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
   */
  private $firstname;

  /**
   * @var string
   *
   * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
   */
  private $lastname;

  /**
   * @var int
   *
   * @ORM\Column(name="typelogin", type="integer")
   */
  private $typelogin;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="createdate", type="datetime")
   */
  private $createdate;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="updatedate", type="datetime")
   */
  private $updatedate;

  public function __construct($data = null)
  {
    $currentDate = new \DateTime();
    $this->createdate = $currentDate;
    $this->updatedate = $currentDate;

    if(isset($data)) {
      $this->username = $data['username'];
      $this->password = $data['password'];
      $this->firstname = $data['firstname'];
      $this->lastname = $data['lastname'];
      $this->typelogin = $data['typelogin'];
    }
  }

  /**
   * Get id
   *
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set username
   *
   * @param string $username
   *
   * @return RegistrationInfo
   */
  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Get username
   *
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Set password
   *
   * @param string $password
   *
   * @return RegistrationInfo
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get password
   *
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set firstname
   *
   * @param string $firstname
   *
   * @return RegistrationInfo
   */
  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;

    return $this;
  }

  /**
   * Get firstname
   *
   * @return string
   */
  public function getFirstname()
  {
    return $this->firstname;
  }

  /**
   * Set lastname
   *
   * @param string $lastname
   *
   * @return RegistrationInfo
   */
  public function setLastname($lastname)
  {
    $this->lastname = $lastname;

    return $this;
  }

  /**
   * Get lastname
   *
   * @return string
   */
  public function getLastname()
  {
    return $this->lastname;
  }

  /**
   * Set typelogin
   *
   * @param integer $typelogin
   *
   * @return RegistrationInfo
   */
  public function setTypelogin($typelogin)
  {
    $this->typelogin = $typelogin;

    return $this;
  }

  /**
   * Get typelogin
   *
   * @return int
   */
  public function getTypelogin()
  {
    return $this->typelogin;
  }

  /**
   * Set createdate
   *
   * @param \DateTime $createdate
   *
   * @return RegistrationInfo
   */
  public function setCreatedate($createdate)
  {
    $this->createdate = $createdate;

    return $this;
  }

  /**
   * Get createdate
   *
   * @return \DateTime
   */
  public function getCreatedate()
  {
    return $this->createdate;
  }

  /**
   * Set updatedate
   *
   * @param \DateTime $updatedate
   *
   * @return RegistrationInfo
   */
  public function setUpdatedate($updatedate)
  {
    $this->updatedate = $updatedate;

    return $this;
  }

  /**
   * Get updatedate
   *
   * @return \DateTime
   */
  public function getUpdatedate()
  {
    return $this->updatedate;
  }
}

