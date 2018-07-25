<?php

namespace AppBundle\Util;

use AppBundle\Util\CodeUtil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Util\ResponseStatusCodeUtil;
use AppBundle\Util\ServiceUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class ValidationUtil
{
  public static function isValidEmail($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function isValidUrl($url)
  {
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url);
  }

  public static function isRegisterInfoValid($data, $locale, &$isValid = false)
  {
    if (!isset($data['username'])) {
      return new View(CodeUtil::buildMinorMessage(CodeUtil::MISSING_USERNAME_CODE, $locale), Response::HTTP_BAD_REQUEST);
    }

    if (!isset($data['typelogin'])) {
      return new View(CodeUtil::buildMinorMessage(CodeUtil::MISSING_TYPE_LOGIN_CODE, $locale), Response::HTTP_BAD_REQUEST);
    }

    if (!isset($data['password'])) {
      return new View(CodeUtil::buildMinorMessage(CodeUtil::MISSING_PASSWORD_CODE, $locale), Response::HTTP_BAD_REQUEST);
    }

    $isValid = true;
  }
}