@extends('Dashboard.master')
@section('title')
    Posts
@endsection
@section('css')
@endsection

@section('page_header')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Posts</h4>
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
                                <li class="breadcrumb-item active" aria-current="page">Posts</li>
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
                    <a href="{{route('posts.create')}}" class="btn btn-success mb-3">Add new Posts</a>

                    <div class="table-responsive">
                        <table id="lang_file" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>image</th>
                                <th>title</th>
                                <th>author</th>
                                <th>date</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($post->image)
                                            <a href="{{ $post->photo }}">
                                                <img src="{{ $post->photo }}" width="50px" height="50px" alt="{{ $post->name }}"
                                                     class="list-thumbnail border-0">
                                            </a>
                                        @endif
                                    </td>

                                    <td>{{$post->title}}</td>
                                    <td>{{$post->author->name}}</td>
                                    <td>{{$post->date}}</td>
                                    <td>
                                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$post->id}}"><i class="fa fa-trash"></i></button>
                                        <a href="{{route('comments.show',$post->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-anchor"></i></a>
                                    </td>
                                    @include('posts::deleted')
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

