<?php

namespace UserBundle\Services;

use AppBundle\Services\AppService;
use UserBundle\Entity\User;

class UserService extends AppService
{
  public function getUser($criteria)
  {
    $userRepo = $this->getEntityManager()->getRepository(User::class);
    $user = $userRepo->findOneBy($criteria);

    return $user;
  }

  public function insert($data)
  {
    $user = new User();
    $user->setUsername($data['username']);
    $user->setPassword($data['password']);
    $user->setTypelogin($data['typelogin']);
    $user->setFullName($data['fullname']);

    $this->getEntityManager()->persist($user);
    $this->getEntityManager()->flush();
  }
}