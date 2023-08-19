@extends('layouts.main')

@section('content')
    <style>
        .pagination .active {
            background: deepskyblue;
            color: white;
        }
    </style>
    <main class="blog">

        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($movies as $movie)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ $movie->image }}" alt="blog post" style="max-width: 100%; height: auto">
                            </div>

                            <div class="d-flex justify-content-between">
                                @if ($movie->categories)
                                    <span class="blog-post-category">
                                    @foreach($movie->categories as $key => $category)
                                        <span class="text-primary">[{{ $category->name }}]</span>
                                        @if($key % 4 == 0 && $key != 0)
                                            <br>
                                        @endif
                                    @endforeach
                                    </span>
                                @endif
                            </div>
                                <h6 class="blog-post-title">{{ $movie->name }}</h6>
                        </div>
                    @endforeach

                </div>
            </section>


            <!-- Display the pagination links -->
            @if(!isset($_GET['page']) && $movies->lastPage() > 1)
                <div class="text-center mb-4" style="margin-top: -100px">
                    <a href="?page=2" class="btn btn-primary">Show More</a>
                </div>
            @endif
            @if($movies->lastPage() > 1 && isset($_GET['page']))
                <div class="pagination justify-content-center mb-4" style="margin-top: -100px">
                    <nav aria-label="Page navigation ">
                        <ul class="pagination">
                            @if($_GET['page'] > 1)
                                <li class="page-item">
                                    <a class="page-link"
                                       href="{{ '?page='.$_GET['page'] - 1 }}"
                                       aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif

                            @for($i = 1;$i <= $movies->lastPage();$i++)
                                <li class="page-item">
                                    <a class="page-link {{ $_GET['page'] == $i ? 'active' : '' }}" href="{{ '?page='.$i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($movies->lastPage() > $_GET['page'])
                                <li class="page-item">
                                    <a class="page-link"
                                       href="{{ '?page='.$_GET['page'] + 1 }}"
                                       aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif

    </main>
@endsection
