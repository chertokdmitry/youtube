<?php

use Jenssegers\Blade\Blade;

class IndexController extends Controller
{
    public $model;
    
    public function __construct()
    {
        $client = new Google_Client();
        $client->setDeveloperKey(app::gi()->config->youtubekey);
        $this->model = new Google_Service_YouTube($client);
    }
    
    public function index()
    {
        $videoData = $this->model->search->listSearch('snippet',
            array(
                'q' => 'surfing',
                'maxResults' => '39',
                'order' => 'rating',
                'type'=> 'channel'
            ));

        $channels = $this->filterData($videoData['items']);
        $blade = new Blade( APP.'views',  APP.'cache');

        echo $blade->make('channels', ['channels' => $channels]);
    }

    public function search()
    {
        $videoData = $this->model->search->listSearch('snippet',
            array(
                'q' => $_GET['keyword'],
                'maxResults' => '39',
                'order' => 'rating',
                'type'=> 'channel'
            ));

        $channels = $this->filterData($videoData['items']);
        $blade = new Blade( APP.'views',  APP.'cache');

        echo $blade->make('channels', ['channels' => $channels]);
    }

    public function filterData($videoItems, $getVideo = false, $getInfo = false)
    {
        $videoData = [];
        for ($i=0; $i<sizeof($videoItems); $i++)
        {

            $data = get_object_vars($videoItems[$i]);
            $dataSnippet = get_object_vars($data['snippet']);

            $dataThubnail = get_object_vars($dataSnippet['thumbnails']);

            if($getInfo) {
                $dataThubnailMedium = get_object_vars($dataThubnail['high']);
            } else {
                $dataThubnailMedium = get_object_vars($dataThubnail['medium']);
            }

            if($getVideo){
                $dataId = get_object_vars($data['id']);
                $id = $dataId['videoId'];
            } else {
                $id = $dataSnippet['channelId'];
            }

            if($getInfo) {

                $dataStatistics = get_object_vars($data['statistics']);
                $dataContentDetails = get_object_vars($data['contentDetails']);

                $videoData[] = ['id' => $id,
                    'title' => $dataSnippet['title'],
                    'publishedAt' => $dataSnippet['publishedAt'],
                    'thumbnail' => $dataThubnailMedium['url'],
                    'like' => $dataStatistics['likeCount'],
                    'dislike' => $dataStatistics['dislikeCount'],
                    'view' => $dataStatistics['viewCount'],
                    'duration' => $dataContentDetails['duration'],
                    'dimension' => $dataContentDetails['dimension']];
            } else {
                $videoData[] = ['id' => $id,
                    'title' => $dataSnippet['title'],
                    'publishedAt' => $dataSnippet['publishedAt'],
                    'thumbnail' => $dataThubnailMedium['url']];
            }
        }
        return $videoData;
    }

    public function gallery($channelId)
    {
        $videoData= $this->model->search->listSearch('snippet',
            array(
                'channelId' => $channelId,
                'maxResults' => '18'
            ));

        $videos = $this->filterData($videoData['items']);
        $blade = new Blade( APP.'views',  APP.'cache');

        echo $blade->make('videos', ['channels' => $videos]);
    }

    public function video($id)
    {
        $data = $this->getVideo($id);

        $blade = new Blade( APP.'views',  APP.'cache');

        echo $blade->make('video',  ['data' => $data, 'videoId' => $id]);
    }

    public function getVideo($id)
    {
        $video = $this->model->videos->listVideos('snippet, statistics, contentDetails', [
            'id' => $id
        ]);

        $videoData = $this->filterData($video['items'], false, true);
        print_r($video);
//        return $videoData;
    }
}

