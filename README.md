# telegram-bot-whoaim
  An example using telegram bot api based on the [irazasyed/telegram-bot-sdk](https://github.com/irazasyed/telegram-bot-sdk), a bot for describe your informations.

## Instruction

### Working

1. Command initial, command start

![whoaimbot initial conversation](http://i.imgur.com/MCQGKdI.png)

2. Getme command

![whoaimbot getme command execution](http://i.imgur.com/49ZZhYq.png)

### How to use (without webhook)

1. Create a bot with [@BotFather](https://telegram.me/BotFather), for more information read the [Documentation] (https://core.telegram.org/bots).

2. git clone https://github.com/dvjunior/telegram-bot-whoaim.git

3. Enter on directory telegram-bot-whoaim and [Install Composer](https://getcomposer.org/download/). On Windows: with Composer [installed](https://getcomposer.org/Composer-Setup.exe) ```composer install```.
On linux: ```curl -sS https://getcomposer.org/installer | php``` and ```php composer.phar install```.

4. Update  ```vendor/irazasyed/telegram-bot-sdk/src/HttpClients/GuzzleHttpClient.php``` ```getOptions``` method (Why? because it's a strict requirement from Telegram.) Look (https://github.com/irazasyed/telegram-bot-sdk/issues/108), And as we are working local just doing GET it is not necessary for CURL to check ssl / tls. (Note: only locally, never on webhook).

  ```php
  $default_options = [
    RequestOptions::HEADERS => $headers,
    RequestOptions::BODY => $body,
    RequestOptions::TIMEOUT => $timeOut,
    RequestOptions::CONNECT_TIMEOUT => $connectTimeOut,
    RequestOptions::SYNCHRONOUS => !$isAsyncRequest,
    RequestOptions::VERIFY => false,
  ]; 
  ```

5. Update config/app.php with your credentials and hook provided by botFather.

6. Start a conversation with your new bot.

7. Open your [App/localBot.php](https://github.com/dvjunior/telegram-bot-whoaim/blob/master/App/localBot.php) via the browser to get the updates and execute the commands.
