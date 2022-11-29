@extends('Dashboard.master')
@section('title')
    Edit Post
@endsection
@section('css')
@endsection

@section('page_header')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Edit Post</h4>
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
                                <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('content')

    <div class="row">
       <div class="col">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">Edit Post</h4>
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
                   <form action="{{route('posts.update',$post->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                       @csrf

                       <div class="row">
                           <div class="col">
                               <label>Title</label>
                               <input type="text" name="title" value="{{$post->title}}" required class="form-control @error('title') is-invalid  @enderror">

                               @error('title')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>


                           <div class="col">
                               <label>Author</label>
                               <input type="text" name="author" value="{{$post->author}}" required class="form-control @error('author') is-invalid  @enderror">

                               @error('author')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>

                       <br>


                       <div class="row">
                           <div class="col">
                               <label>Content</label>
                               <textarea class="form-control @error('content') is-invalid  @enderror" rows="5" required name="content">
                                   {{$post->content}}
                               </textarea>

                               @error('content')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>


                       </div>

                       <br>

                       <div class="row">
                           <div class="col">
                               @if($post->photo)
                                   <a href="{{ $post->photo }}">
                                       <img src="{{ $post->photo }}" width="50px" height="50px" alt="{{ $post->title }}"
                                            class="list-thumbnail border-0">
                                   </a>
                               @endif
                           </div>
                           <div class="col">
                               <label>Image</label>
                               <input type="file" name="image" accept="image/*">

                               @error('image')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>

                       <br>

                       <div class="row">
                           <div class="col-2">
                               <button class="btn btn-success btn-block">Update Post</button>
                           </div>
                           <div class="col-2">
                               <a href="{{route('posts.index')}}" class="btn btn-primary btn-block">Posts</a>
                           </div>
                       </div>

                   </form>
               </div>
           </div>
       </div>
    </div>

@endsection

@section('js')

@endsection

