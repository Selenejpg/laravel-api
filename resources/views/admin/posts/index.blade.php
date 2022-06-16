@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
            
        @endif

        <a href="{{route('admin.posts.create')}}" class="btn btn-success">Crea post</a>

        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th>{{$post->title}}</th>
                        <td>
                            @if($post->category)
                                <span class="badge badge-pill badge-{{$post->Category->color}}">{{$post->Category->label}}</span>
                            @else
                                -
                            @endif             
                        </td>
                        <td><p>{{$post->content}}</p></td>        
                        <td><img src="{{$post->image}}" alt="{{$post->image}}" width="50"></td>
                        <td>{{$post->slug}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary" href="{{route('admin.posts.show', $post->id)}}">View</a>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                @empty
                    <h2>Non ci sono post.</h2>
                @endforelse
            </tbody>
        </table>

        {{-- @if($posts->hasPages())
            {{$posts->links()}}
        @endif --}}
    </div>

@endsection


@section('scripts')
<script>
    const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', (e) =>{
                e.preventDefault();
                const confirmation = confirm('Sei sicuro di eliminare il dato?');
                if (confirmation) e.target.submit();
            });
        });
</script>   
@endsection

