@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Create Movie</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form method="post" action="{{ route('admin.movie.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" autocomplete="on" class="form-control" name="name"
                           placeholder="..." value="{{ old('name') }}">
                    @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" id="image" autocomplete="on" class="form-control" name="image"
                           placeholder="..." value="{{ old('image') }}">
                    @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category[]" class="form-control" multiple>
                        <option value="">Choose category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                @foreach(old('category') as $sel_cat)
                                    {{ $sel_cat == $category->id ? 'selected' : '' }}
                                @endforeach>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3" style="margin-left: 20px">
                    <input type="checkbox" id="usability" class="form-check-input -mouse-pointer"
                           name="is_posted" autocomplete="on" value="1" {{ old('is_posted') ? 'checked' : '' }}
                    >
                    <label for="usability" class="form-check-label">Is Publish</label>
                    @error('is_posted')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">Create</button>
            </form>
        </div>
    </div>
@endsection
