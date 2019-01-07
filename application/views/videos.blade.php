@extends('index')

@section('content')
    <br><br>
    <div class="row">

        @foreach ($channels as $channel)

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{ $channel['thumbnail'] }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ $channel['title'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                               @php
                                {{ $date = date('Y-m-d H:i', strtotime($channel['publishedAt'] )); }}
                            @endphp
                            <small class="text-muted"> {{ $date }}</small>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@endsection