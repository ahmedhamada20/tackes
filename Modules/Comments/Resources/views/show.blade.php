@extends('Dashboard.master')
@section('title')
    Comment Post : {{$post->title}}
@endsection
@section('css')
@endsection

@section('page_header')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title"> Comment Post : {{$post->title}}</h4>
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Comment Post
                                    : {{$post->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section('content')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ Session::get('message') }}</strong>
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ Session::get('error') }}</strong>
                                </div>
                            @endif
                        </div>


                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <a href="" data-toggle="modal" data-target="#createComment" class="btn btn-block btn-success mb-3">Add new comments</a>
                                    @include('comments::create')
                                </div>

                                <div class="col-3">
                                    <a href="{{route('posts.index')}}" class="btn btn-block btn-info">Posts</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="lang_file" class="table table-striped table-bordered display"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>comment</th>
                                        <th>user</th>
                                        <th>date</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($post->comments as $comment)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>{{$comment->user->name}}</td>
                                            <td>{{$comment->date}}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editComment{{$comment->id}}"><i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletedComment{{$comment->id}}"><i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                            @include('comments::edit')
                                            @include('comments::deleted')
                                        </tr>
                                    @empty


                                    @endforelse

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('js')

@endsection

