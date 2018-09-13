<?php

class VideoController extends Controller
{

    public function __construct()
    {   
        $this->model = new Video();
    }
    
    public function view()
    {	
        return $this->model->getVideo(App::gi()->uri->id);
    }
}
