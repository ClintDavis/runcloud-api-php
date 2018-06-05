<?php
namespace ClintDavis\RuncloudAPI\Tests;

require_once '../../../src/RuncloudAPI/Client.php';
require_once '../../../src/RuncloudAPI/HttpClient/HttpClient.php';
require_once '../../../src/RuncloudAPI/HttpClient/Options.php';
require_once '../../../src/RuncloudAPI/HttpClient/BasicAuth.php';
require_once '../../../src/RuncloudAPI/HttpClient/Request.php';
require_once '../../../src/RuncloudAPI/HttpClient/Response.php';

use \ClintDavis\RuncloudAPI\Client;

$runcloud = new Client(
    'key_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 
    'secret_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
);

$authenticate = $runcloud->get('ping');
echo '<pre>';
echo '<hr/>';
print_r($authenticate);
echo '<hr/>';
echo '</pre>';