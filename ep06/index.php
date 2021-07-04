<?php

use League\OAuth2\Client\Provider\Facebook;

ob_start();

require __DIR__ . "/vendor/autoload.php";
var_dump($_SESSION);
if (empty($_SESSION["user_login"])) {
  echo "<h1>Guest</h1>";
  /**
   * AUTH FACEBOOK
   */
  $facebook = new Facebook([
    'clientId' => FACEBOOK["app_id"],
    'clientSecret' => FACEBOOK["app_secret"],
    'redirectUri' => FACEBOOK["app_redirect"],
    'graphApiVersion' => FACEBOOK["app_version"],
  ]);

  $authUrl = $facebook->getAuthorizationUrl([
    "scope" => ["email"]
  ]);

  $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_URL);
  echo $error;
  if($error){
    echo "Você precisa autorizar para continuar";
  }
  echo "<a title='FB Login' href='{$authUrl}'>Facebook Login</a>";

  $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_URL);
  if($code){
    $token = $facebook->getAccessToken("autorization_code", [
      "code"=>$code
    ]);

    $_SESSION["userLogin"] = $facebook->getResourceOwner($token);
    header("Refresh: 0");
  }

} else {
  echo "<h1>User Name</h1>";
}
ob_end_flush();
