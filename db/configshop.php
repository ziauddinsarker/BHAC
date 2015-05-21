<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
define('DB_DRIVER', 'mysql');
define('DB_PREFIX', 'em_');
define("DB_HOST", "localhost");
define("DB_USER", "bhaloachee");
define("DB_PASSWORD", "19A14t1&");
define("DB_DATABASE", "bhaloach_dev");

try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}
?>