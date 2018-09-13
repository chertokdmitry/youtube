<?php

class Card 
{
    public $html;
    
    public function __construct($data)
    {
        $this->html = '<div class="card">'
                . '<img class="card-img-top" src="' . $data['thumbnail'] . '" alt="">'
                . '<div class="card-body">'
                . '<h5 class="card-title">' . $data['title'] . '</h5>'
                . '</div>'
                . '<ul class="list-group list-group-flush">'
                . '<li class="list-group-item">Published: '  . $data['publishedAt'] . '</li>'
                . '<li class="list-group-item">Views: ' . $data['view'] . '</li>'
                . '<li class="list-group-item">Like: ' . $data['like'] . '</li>'
                . '<li class="list-group-item">Dislike: ' . $data['dislike'] .'</li>'
                . '<li class="list-group-item">Duration: ' . $data['duration'] . '</li>'
                . '<li class="list-group-item">Quality: ' . $data['dimension']. '</li>'
                . '</ul>'
                . '<div class="card-body">'
                . '<a href="/channel/view/' . $data['id'] . '" class="btn btn-primary">Back to channel</a>'
                . '</div>'
                . '</div>';
        
        return $this->html;
    }
}
