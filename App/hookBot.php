<?php

/**
* An example of bot using webhook
* In this case telegram API sends updates for you
*
*/

require  __DIR__ . '/../vendor/autoload.php';
require  __DIR__ . '/../config/app.php'; 

use Telegram\Bot\Api;

use Commands\GetmeCommand;
use Commands\StartCommand;

$telegram = new Api(API_KEY);
$telegram->setWebhook(array('url' => HOOK_URL));

$telegram->addCommands([StartCommand::class,
						GetmeCommand::class,
]);

#$response = $telegram->getMe();
#$botId = $response->getId();
#$firstName = $response->getFirstName();
#$username = $response->getUsername();

$telegram->commandsHandler(true);