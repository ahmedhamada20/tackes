@extends('Dashboard.master')
@section('title')
Home
@endsection


@section('css')

@endsection

@section('page_header')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('title')

@endsection

@section('content')
        <div class="card-group">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                                        <span class="btn btn-circle btn-lg bg-danger">
                                            <i class="ti-clipboard text-white"></i>
                                        </span>
                        </div>
                        <div>
                            Posts
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{\Modules\Posts\Entities\Post::count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                                        <span class="btn btn-circle btn-lg btn-info">
                                            <i class="ti-wallet text-white"></i>
                                        </span>
                        </div>
                        <div>
                            Comments

                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{\Modules\Comments\Entities\Comment::count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>



        </div>
@endsection

@section('js')

@endsection

