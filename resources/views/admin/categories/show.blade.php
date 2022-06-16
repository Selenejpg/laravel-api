@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$category->label}}</h2>
        <span class="badge badge-pill badge-{{$category->color}}">{{$category->label}}</span>
        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-form">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection