<?php
require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '609323569205559',
  'app_secret' => '53c24b308bbae22b7e534573742e906f',
  'default_graph_version' => 'v2.4',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://yodas.brain/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

?>
