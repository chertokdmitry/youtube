<?php

class Video extends Model
{
    public $html;
    
    public function getVideo(string $id) 
    {
        $video = new YouTubeVideo();
        $videoData = $video->getVideo($id);
        
        $gallery = new Card($videoData[0]);
        return $gallery->html;
    }
}
