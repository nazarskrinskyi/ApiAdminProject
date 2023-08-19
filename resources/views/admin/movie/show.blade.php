@extends('layouts.admin')

@section('content')

    <div>
        <h1 class="text-center">{{ $movie->name }}</h1>
        <a class="btn btn-warning mb-3" href="{{ route('admin.movie.edit', $movie->id) }}">Edit</a>
        <form method="POST" action="{{ route('admin.movie.delete', $movie->id) }}"
              class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mb-3"
                    onclick="return confirm('Are you sure?')">Delete
            </button>
        </form>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Posted</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center" scope="row">{{ $movie->id }}</th>
                <td class="text-center">{{ $movie->name }}</td>
                <td class="text-center">
                    @foreach($categories as $key => $category)
                        [<strong class="text-info">{{ $category->name }}</strong>]
                        @if(($key+1) % 4 == 0 && $key != 0)
                            <br>
                        @endif
                    @endforeach
                </td>
                <td class="text-center">{{ $movie->is_posted == 1 ? 'Yes' : 'No'}}</td>
            </tr>
            </tbody>
        </table>
        <div class="mt-2 text-center">
            <h4 class=" mb-4 ">Image: {{ $movie->image }}</h4>
            <img src="{{ $movie->image }}" class="img-fluid" alt="No image...">
        </div>
    </div>
@endsection
