<?php

class Channels extends Model
{
    public function __construct()
    {
        $client = new Google_Client();
        $client->setDeveloperKey(app::gi()->config->youtubekey);
        $googleService = new Google_Service_YouTube($client);
        return $googleService;
    }
}
