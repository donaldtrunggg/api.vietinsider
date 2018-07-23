<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Login
 *
 * @ORM\Table(name="login")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\LoginRepository")
 */
class Login
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
   * @var int
   *
   * @ORM\Column(name="uid", type="integer", unique=true)
   * @ORM\OneToOne(targetEntity="RegistrationInfo", inversedBy="id")
   * @ORM\JoinColumn(name="uid", referencedColumnName="uid")
   */
  private $uid;

  /**
   * @var string
   *
   * @ORM\Column(name="accesstoken", type="string", length=255, unique=true)
   */
  private $accesstoken;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="lastlogin", type="datetime")
   */
  private $lastlogin;

  /**
   * @var string
   *
   * @ORM\Column(name="lang", type="string", length=2, unique=true)
   */
  private $lang;

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
   * Set uid
   *
   * @param integer $uid
   *
   * @return Login
   */
  public function setUid($uid)
  {
    $this->uid = $uid;

    return $this;
  }

  /**
   * Get uid
   *
   * @return int
   */
  public function getUid()
  {
    return $this->uid;
  }

  /**
   * Set accesstoken
   *
   * @param string $accesstoken
   *
   * @return Login
   */
  public function setAccesstoken($accesstoken)
  {
    $this->accesstoken = $accesstoken;

    return $this;
  }

  /**
   * Get accesstoken
   *
   * @return string
   */
  public function getAccesstoken()
  {
    return $this->accesstoken;
  }

  /**
   * Set lastlogin
   *
   * @param \DateTime $lastlogin
   *
   * @return Login
   */
  public function setLastlogin($lastlogin)
  {
    $this->lastlogin = $lastlogin;

    return $this;
  }

  /**
   * Get lastlogin
   *
   * @return \DateTime
   */
  public function getLastlogin()
  {
    return $this->lastlogin;
  }

  /**
   * @return string
   */
  public function getLang()
  {
    return $this->lang;
  }

  /**
   * @param string $lang
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
}

