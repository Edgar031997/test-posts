@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">

                <h5 class="card-title">{{ $post->title }}</h5>
                <h5 class="card-title"><a href="{{'/author/'.$post->author->author_ip}}">Author IP {{ $post->author->author_ip }}</a></h5>
                <p class="card-text">{{$post->text}}</p>

                <comments-component :comments="{{json_encode($post->comments)}}" :post_id="{{$post->id}}"></comments-component>
            </div>
        </div>
    </div>
@endsection
