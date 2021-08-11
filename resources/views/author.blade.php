@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <h5 class="card-title">Author IP {{ $author->author_ip }}</h5>

                <h2>Author Posts</h2>

                <author-posts-component :posts="{{json_encode($posts)}}" author_ip="{{$author->author_ip}}"></author-posts-component>
            </div>
        </div>
    </div>
@endsection
