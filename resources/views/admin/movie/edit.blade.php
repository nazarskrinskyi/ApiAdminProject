@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Edit Movie</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form method="POST" action="{{ route('admin.movie.update',$movie->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" autocomplete="on" class="form-control" name="name"
                           placeholder="..." value="{{ $movie->name }}">
                    @error('name')
                    <strong class="text-danger">{{ $message  }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" id="image" autocomplete="on" class="form-control" name="image"
                           placeholder="..." value="{{ $movie->image }}">
                    @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category[]" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @foreach($category_movies as $category_movie)
                                    {{ $category->id === $category_movie->category_id ? 'selected' : '' }}
                                @endforeach
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3" style="margin-left: 20px">
                    <input type="checkbox" id="usability" class="form-check-input -mouse-pointer"
                           name="is_posted" autocomplete="on"
                           value="1" {{ $movie->is_posted === 1 ? 'checked' : '' }}
                    >
                    <label for="usability" class="form-check-label">Posted</label>
                    @error('is_posted')
                    <strong class="text-danger">{{ $message  }}</strong>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">Edit</button>
            </form>
        </div>
    </div>
@endsection
