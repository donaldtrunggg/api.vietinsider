<?php
# oauth-server/src/Application/ServerBundle/Entity/AccessToken.php
namespace AuthenticateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;

/**
 * @ORM\Table(name="tbloauth_access_token", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class AccessToken extends BaseAccessToken
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="Client")
   * @ORM\JoinColumn(nullable=false)
   */
  protected $client;
}