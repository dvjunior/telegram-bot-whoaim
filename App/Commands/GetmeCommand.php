<?php

namespace Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class GetmeCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "getme";

    /**
     * @var string Command Description
     */
    protected $description = "Fornece informações sobre usuários e chats";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithChatAction(['action' => Actions::UPLOAD_PHOTO]);

        # if you're using local bot, without webook
        # In this example, I'm using local hook for tests
        $update = json_decode($this->getUpdate(), true);

        # if you're using webhook for receive updates.
        #$update = $this->getTelegram()->getWebhookUpdates();

        $name = $update['message']['from']['first_name'].' '.$update['message']['from']['last_name'];
        $user_id = $update['message']['from']['id'];
        $username = $update['message']['from']['username'];
        $chat_id = $update['message']['chat']['id'];


        $userProfilePhoto = $this->getTelegram()->getUserProfilePhotos(['user_id' => $user_id]);
        
        $file = $this->getTelegram()->getFile(['file_id' => $userProfilePhoto['photos'][0][0]['file_id']]);
        $photo = $file->getFilePath();
        $photo = 'https://api.telegram.org/file/bot'.$this->getTelegram()->getAccessToken().'/'.$photo;

        $this->replyWithPhoto([
            'photo' => $photo,
            'caption' => "Your Id: $user_id \nName: $name \nUsername: $username \nChat_id: $chat_id",
        ]);




    }
}