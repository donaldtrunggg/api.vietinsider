<?php

namespace AppBundle\Util;

class CodeUtil
{
  public static function buildMinorMessage($code, $locale)
  {
    return ResponseStatusCodeUtil::buildMessage($code, self::RESPONSE_MAPPING[$code][$locale], null);
  }

  const SUCCESS_CODE = 200;
  const MISSING_USERNAME_CODE = 1001;
  const MISSING_TYPE_LOGIN_CODE = 1002;
  const MISSING_PASSWORD_CODE = 1003;
  const EXISTED_USERNAME_CODE = 303;

  const SUCCESS_MESSAGE = array(
    LanguageUtil::ENGLISH => 'Success',
    LanguageUtil::VIETNAMESE => 'Success - vi'
  );

  const MISSION_USERNAME_MESSAGE = array(
    LanguageUtil::ENGLISH => 'Missing username',
    LanguageUtil::VIETNAMESE => 'Missing username - vi'
  );

  const MISSING_TYPE_LOGIN_MESSAGE = array(
    LanguageUtil::ENGLISH => 'Missing type login',
    LanguageUtil::VIETNAMESE => 'Missing type login - vi'
  );

  const MISSING_PASSWORD_MESSAGE = array(
    LanguageUtil::ENGLISH => 'Missing password',
    LanguageUtil::VIETNAMESE => 'Missing password - vi'
  );

  const EXISTED_USERNAME_MESSAGE = array(
    LanguageUtil::ENGLISH => 'Username is existed',
    LanguageUtil::VIETNAMESE => 'Username is existed - vi'
  );

  const RESPONSE_MAPPING = array(
    self::SUCCESS_CODE => self::SUCCESS_MESSAGE,

    self::MISSING_USERNAME_CODE => self::MISSION_USERNAME_MESSAGE,
    self::MISSING_TYPE_LOGIN_CODE => self::MISSING_TYPE_LOGIN_MESSAGE,
    self::MISSING_PASSWORD_CODE => self::MISSING_PASSWORD_MESSAGE,

    self::EXISTED_USERNAME_CODE => self::EXISTED_USERNAME_MESSAGE
  );
}