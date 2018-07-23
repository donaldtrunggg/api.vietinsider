<?php

namespace AppBundle\Util;

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
}