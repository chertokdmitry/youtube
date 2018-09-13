<?php

class IndexController extends Controller
{
    public $model;
    
    public function __construct()
    {
        $this->model = new Index();
    }
    
    public function index()
    {	
        return $this->model->getVideos();       
    }
    
    public function update()
    {	

        $fileContent = '<?php return "' .  date(DATE_RFC3339, strtotime("-6 hours")) . '";';
        file_put_contents(APP. 'time.php', $fileContent);
     
        return $this->model->getVideos();   
    }
}

