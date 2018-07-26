<?php

namespace UserBundle\Controller;

use AppBundle\Util\ServiceUtil;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class UserController extends FOSRestController
{

  /**
   * @Rest\Get("/user")
   */
  public function getAction()
  {
    print_r('D co gi');
  }
}
