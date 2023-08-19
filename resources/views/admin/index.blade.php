@extends('layouts.admin')

@section('content')
    <div class="content-wrapper container-fluid" style="min-height: 300px;background: white">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="margin-left: 60px">
                        <h1 class="text-right" style="font-size: xxx-large;font-family: 'Source Code Pro', 'SF Mono', Monaco, Inconsolata, 'Fira Mono', 'Droid Sans Mono', monospace, monospace">Admin Panel</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $movies }}</h3>

                        <p>Movies</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <a href="{{ route('admin.movie.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $categories }}</h3>

                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <a href="{{ route('admin.category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
@endsection
