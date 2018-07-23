<?php

namespace UserBundle\Services;

use AppBundle\Services\AppService;
use AppBundle\Util\RepositoryUtil;
use FOS\RestBundle\View\View;
use UserBundle\Entity\Login;
use UserBundle\Entity\RegistrationInfo;

class UserService extends AppService
{
  public function getUser($criteria)
  {
    $registrationInfoRepo = $this->getEntityManager()->getRepository(RepositoryUtil::REGISTRATION_INFO_REPO);
    $registrationInfo = $registrationInfoRepo->findOneBy($criteria);

    return $registrationInfo;
  }

  public function insertUser($data)
  {
    $user = new RegistrationInfo($data);

    $this->getEntityManager()->persist($user);
    $this->getEntityManager()->flush();
  }

  public function updateLogin($userId, $lang)
  {
    $loginRepo = $this->getEntityManager()->getRepository(RepositoryUtil::LOGIN_REPO);
    $login = $loginRepo->findOneBy(['uid' => $userId]);

    if (!isset($login)) {
      $login = new Login();
    }

    $accessToken = bin2hex(random_bytes(50));
    $login->setAccesstoken($accessToken);

    $login->setUid($userId);
    $login->setLastlogin(new \DateTime());
    $login->setLang($lang);

    $this->getEntityManager()->persist($login);
    $this->getEntityManager()->flush();

    return $accessToken;
  }
}