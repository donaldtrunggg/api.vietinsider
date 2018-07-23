<?php

namespace AppBundle\Util;

use Symfony\Component\HttpFoundation\JsonResponse;

class ResponseStatusCodeUtil
{
  public static function buildMessage($code, $message, $data)
  {
    $reponse = array(
      'code' => $code,
      'message' =>$message,
      'data' => $data
    );
    
    return $reponse;
  }
}