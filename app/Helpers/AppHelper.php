<?php
namespace App\Helpers;
use Session;
use DB;
use Mail;
class AppHelper {

public static function unqNum(){
  $length = 6;
  $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
  $randomString1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
  $randomString = $randomString.$randomString1;
  return $randomString;
}
}
?>