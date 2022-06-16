@extends('layouts.app')

@section('content')
    <div class="container">
        <img width="50%" src="{{asset("storage/$post->image")}}" alt="{{$post->title}}">
        <h2>{{$post->title}}</h2>
        @if($post->category)
            <span class="badge badge-pill badge-{{$post->Category->color}}">{{$post->Category->label}}</span>
        @else
            nessuna categoria assegnata
        @endif   
        <p>{{$post->content}}</p>

        <h3>Tags:</h3>
        @forelse ($post->tags as $tag)
            <span class="badge badge-pill" style="background-color: {{$tag->color}}">{{$tag->label}}</span>
            
        @empty
            <h3>Non ci sono tag abbinati</h3>   
        @endforelse
    </div>
@endsection