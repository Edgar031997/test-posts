@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">

                <h2>All Posts</h2>

                <posts-component :posts="{{json_encode($posts)}}"></posts-component>
            </div>
        </div>
    </div>
@endsection
