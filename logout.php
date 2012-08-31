<?php
// Sample code of Facebook PHP SDK said "to logout, use '$facebook->getLogoutUrl();'".
// But this code is not enough for remaining sessions.
// To logout correctly, use BaseFacebook::destroySession() method.
//
// <a href="http://d.hatena.ne.jp/imaiworks/20120518/1337310167">facebook php sdk api でログアウトする方法 - いろいろつまみ食い</a>

require_once 'bootstrap.php';

$facebook = new Facebook(array(
  'appId'  => Config::$appId,
  'secret' => Config::$secret,
));

$logoutUrl = $facebook->getLogoutUrl(array(
    'next' => $_SERVER['HTTP_REFERER']
));
$facebook->destroySession();

header("Location: {$logoutUrl}");