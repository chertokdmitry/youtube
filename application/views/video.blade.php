@extends('index')

@section('content')
    @php
        {{ $date = date('Y-m-d H:i', strtotime($data['publishedAt'] )); }}
    @endphp
    <div class="card">
        <img class="card-img-top" src="{{ $data['thumbnail'] }}" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $data['title']  }}</h5>
        </div>
        <div class="card-body">
            <a target="_blank" href="https://www.youtube.com/watch?v={{ $videoId }}" class="btn btn-danger btn-lg btn-block">Открыть видео</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Published: {{ $date }}</li>
            <li class="list-group-item">Views: {{ $data['view'] }}</li>
            <li class="list-group-item">Like: {{ $data['like'] }}</li>
            <li class="list-group-item">Dislike: {{ $data['dislike'] }}</li>
            <li class="list-group-item">Duration: {{ $data['duration'] }}</li>
            <li class="list-group-item">Quality: {{ $data['dimension'] }}</li>
        </ul>
        <div class="card-body">
            <a href="/channel/{{ $data['id'] }}" class="btn btn-secondary btn-lg btn-block">Вернуться</a>
        </div>
    </div>
@endsection