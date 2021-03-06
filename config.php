<?php

define('BASE', (($_SERVER['DOCUMENT_ROOT'] != '') ? $_SERVER['DOCUMENT_ROOT'] : dirname(realpath(__FILE__))));
define('NAME', 'YARMan Web');
define('BRAND', 'core/img/site-logo.png');
define('COOKIE_LIFETIME', 60*60*24*7*4*3);

define('INC', BASE.DIRECTORY_SEPARATOR.'core');
define('JS', BASE.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'js');
define('CSS', BASE.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'css');
define('DB', BASE.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'db');
define('DATA', BASE.DIRECTORY_SEPARATOR.'data');
define('CACHE', BASE.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'cache');
define('MODULES', BASE.DIRECTORY_SEPARATOR.'modules');
define('SCRIPTS', BASE.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'scripts');

define('MODULE', 'config.json');
define('URL_SEPARATOR', '/');

define('FILE_CACHE', false);
define('FILE_COMPRESS', false);

config::includes(INC);
session::construct();
db::instance()->construct();

class config
{
  public static function includes($path)
  {
    foreach (scandir($path) as $include) {
      if (is_file($path.DIRECTORY_SEPARATOR.$include) && strpos($path.DIRECTORY_SEPARATOR.$include, '.class.') !== false && strtoupper(pathinfo($include, PATHINFO_EXTENSION)) == 'PHP') {
        require_once($path.DIRECTORY_SEPARATOR.$include);
      }
    }
  }
}

?>