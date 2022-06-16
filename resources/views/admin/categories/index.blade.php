@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
            
        @endif

        <a href="{{route('admin.categories.create')}}" class="btn btn-success">Crea category</a>

        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Label</th>
                <th scope="col">Color</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <th>{{$category->label}}</th>
                        <td><p>{{$category->color}}</p></td>        
                        <td class="d-flex">
                            <a class="btn btn-primary" href="{{route('admin.categories.show', $category->id)}}">View</a>
                            <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-form">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                @empty
                    <h2>Non ci sono categorie</h2>
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

