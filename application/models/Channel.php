<?php

class Channel extends Model
{

    public function getVideos(string $id) 
    {
        $videos = new YouTubeVideo();
        $videoData = $videos->getVideoGallery($id);

        $gallery = new Gallery($videoData[0]['title'], $videoData, 'video');
        return $gallery->html;
    }
}
