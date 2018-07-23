<?php

namespace UserBundle\Controller;

use AppBundle\Util\ResponseStatusCodeUtil;
use AppBundle\Util\ServiceUtil;
use AppBundle\Util\ValidationUtil;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class UserController extends FOSRestController
{
  /**
   * @Rest\Get("/user")
   */
  public function getAction()
  {
    print "hi";
    die();
    $s = $this->get(ServiceUtil::USER_SERVICE)->getEmployersEvent();
    dump($s);
    die();
    $restresult = $this->getDoctrine()->getRepository('UserBundle:RegistrationInfo')->findAll();
    dump($restresult);
    die();
    if ($restresult === null) {
      return new View("there are no users exist", Response::HTTP_NOT_FOUND);
    }
    return $restresult;
  }

  /**
   * @Rest\Post("/user/register")
   */
  public function registerAction(Request $request)
  {
    $dataInsert = array(
      'username' => $request->request->get('username'),
      'typelogin' => $request->request->get('typelogin'),
      'password' => md5($request->request->get('password')),
      'firstname' => $request->request->get('firstname'),
      'lastname' => $request->request->get('lastname')
    );

    if (!isset($dataInsert['username'])) {
      return new View(ResponseStatusCodeUtil::buildMessage(Response::HTTP_BAD_REQUEST, 'Missing username', null), Response::HTTP_BAD_REQUEST);
    }

    if (!isset($dataInsert['typelogin'])) {
      return new View(ResponseStatusCodeUtil::buildMessage(Response::HTTP_BAD_REQUEST, 'Missing typelogin', null), Response::HTTP_BAD_REQUEST);
    }

    if (!isset($dataInsert['password'])) {
      return new View(ResponseStatusCodeUtil::buildMessage(Response::HTTP_BAD_REQUEST, 'Missing typelogin', null), Response::HTTP_BAD_REQUEST);
    }

    if (!ValidationUtil::isValidEmail($dataInsert['username'])) {
      return new View(ResponseStatusCodeUtil::buildMessage(Response::HTTP_BAD_REQUEST, 'Username invalid', null), Response::HTTP_BAD_REQUEST);
    }

    $user = $this->get(ServiceUtil::USER_SERVICE)->getUser(['username' => $dataInsert['username']]);

    if (isset($user)) {
      return new View(ResponseStatusCodeUtil::buildMessage(Response::HTTP_FOUND, 'Username is existed', null), Response::HTTP_FOUND);
    }

    $this->get(ServiceUtil::USER_SERVICE)->insertUser($dataInsert);
    $user = $this->get(ServiceUtil::USER_SERVICE)->getUser($dataInsert);
    $userId = $user->getId();

    $accessToken = $this->get(ServiceUtil::USER_SERVICE)->updateLogin($userId, $request->request->get('language'));
    return new View(ResponseStatusCodeUtil::buildMessage(Response::HTTP_OK, 'Insert success', ['access_token' => $accessToken]), Response::HTTP_OK);
  }
}
