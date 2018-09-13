<?php

class Gallery
{
    public $html;
    
    public function __construct($name, $data = [], $controller)
    {   
        $this->html = '<h3>' . $name . '</h3><div class="card-deck" style="margin-bottom: 1rem">' . $this->card($data, $controller) . '</div>';  
    }
              
    public function card($data, $controller)
    {
        $html= '';
        $line = 0;
        
        for ($i=0; $i<sizeof($data); $i++) {
            $line++;
            $html .= '<div class="card"><div class="card-body  mr-10">';
            $html .= '<img class="card-img-top" src="' . $data[$i]['thumbnail'] . '" alt=" ">';
            
            if($data[$i]['id']) {
                $html .= '<br><br><h6 class="card-title"><a href="/'. $controller . '/view/' . $data[$i]['id'] . '">' . $data[$i]['title'] . '</a></h5>';
                $html .= '<p class="card-text">' . $data[$i]['publishedAt'] . '</p>';
            }

            $html .= '</div></div>';
            
            if($line==3) {
                $html .= '</div><div class="card-deck" style="margin-bottom: 1rem">';
                $line = 0;
            }
        }
        return $html;
    }
}
