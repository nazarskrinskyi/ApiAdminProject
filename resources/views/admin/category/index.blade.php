@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1 class="text-center text-uppercase">Categories</h1>
        <a class="btn btn-primary mb-3" href="{{ route('admin.category.create') }}">Create Category</a>
        <table class="table"  style="border: 2px solid #1b1e21">
            <thead>
            <tr class="text-center" style="border: 4px solid #1b1e21">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr  style="border: 2px solid darkgrey">
                    <th class="text-center" scope="row">{{ $category->id }}</th>
                    <td class="text-center"><a href="{{ route('admin.category.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td class="text-center">
                        <a href="{{ route('admin.category.edit', $category->id) }}"
                           class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.category.delete', $category->id) }}"
                              class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Display the pagination links -->
        @if(!isset($_GET['page']) && $categories->lastPage() > 1)
            <div class="text-center mt-2">
                <a href="?page=2" class="btn btn-primary">Show More</a>
            </div>
        @endif

        @if($categories->lastPage() > 1 && isset($_GET['page']))
            <div class="pagination justify-content-center">
                <nav aria-label="Page navigation ">
                    <ul class="pagination">
                        @if($_GET['page'] > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ '?page=' . $_GET['page'] - 1 }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @endif

                        @for($i = 1;$i <= $categories->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{ '?page=' . $i }}">{{ $i }}</a></li>
                        @endfor

                        @if($categories->lastPage() > $_GET['page'])
                            <li class="page-item">
                                <a class="page-link" href="{{ '?page='.$_GET['page'] + 1 }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif


    </div>
@endsection
