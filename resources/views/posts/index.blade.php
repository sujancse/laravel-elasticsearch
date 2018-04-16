@extends('layouts.master')

@section('title','Post list')

@section('content')
    @foreach($posts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
    @endforeach

    {{ $posts->links() }}

@endsection
