<?php

class Index extends Model
{  
    public function getVideos() 
    {
        $channels = new YouTubeVideo();
        $channelsData = $channels->getChanels(app::gi()->config->time);
        $updates = 'Latest channels from ' . app::gi()->config->time;
        $gallery = new Gallery($updates, $channelsData, 'channel');
        return $gallery->html;
    }
}


