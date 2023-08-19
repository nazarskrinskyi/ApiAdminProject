@extends('layouts.admin')

@section('content')
<h1 class="text-center">Edit Category</h1>
<div class="row justify-content-center mt-4">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <form method="POST" action="{{ route('admin.category.update',$category->id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" autocomplete="on" class="form-control" name="name"
                       value="{{ $category->name }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary mt-2">Edit</button>
        </form>
    </div>
</div>
@endsection
