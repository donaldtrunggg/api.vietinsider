<?php

namespace AppBundle\Controller;

use AppBundle\Util\CodeUtil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Util\ResponseStatusCodeUtil;
use AppBundle\Util\ServiceUtil;
use AppBundle\Util\ValidationUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;


class AppController extends Controller
{
  /**
   * @Rest\Post("/register")
   */
  public function registerAction(Request $request)
  {
    $data = array(
      'username' => $request->request->get('username'),
      'typelogin' => $request->request->get('typelogin'),
      'password' => password_hash($request->request->get('password'), PASSWORD_DEFAULT),
      'fullname' => $request->request->get('fullname')
    );

    $locale = $request->headers->get('accept-language');
    $view = ValidationUtil::isRegisterInfoValid($data, $locale, $isValid);

    if (!$isValid) {
      return $view;
    }

    $user = $this->get(ServiceUtil::USER_SERVICE)->getUser(['username' => $data['username']]);

    if (isset($user)) {
      return new View(CodeUtil::buildMinorMessage(CodeUtil::EXISTED_USERNAME_CODE, $locale), Response::HTTP_FOUND);
    }

    $this->get(ServiceUtil::USER_SERVICE)->insert($data);
    return new View(CodeUtil::buildMinorMessage(CodeUtil::SUCCESS_CODE, $locale), Response::HTTP_OK);
  }

  /**
   * @Rest\Get("/login")
   */
  public function loginAction()
  {
    dump('login');
    die();
  }
}
