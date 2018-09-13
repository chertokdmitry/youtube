<?php

class ChannelController extends Controller
{
    public $model;
    
    public function __construct()
    {
        $this->model = new Channel();
    }
    
    public function view($id)
    {	
        return $this->model->getVideos(App::gi()->uri->id);       
    }
}