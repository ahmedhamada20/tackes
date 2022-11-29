@extends('Dashboard.master')
@section('title')
    Create Posts
@endsection
@section('css')
@endsection

@section('page_header')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Create Posts</h4>
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
                                <li class="breadcrumb-item active" aria-current="page">Create Posts</li>
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
                   <h4 class="card-title">Create new Posts</h4>
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
                   <form action="{{route('posts.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                       @csrf

                       <div class="row">
                           <div class="col">
                               <label>Title</label>
                               <input type="text" name="title" value="{{old('title')}}" required class="form-control @error('title') is-invalid  @enderror">

                               @error('title')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>

                       </div>

                       <br>


                       <div class="row">
                           <div class="col">
                               <label>Content</label>
                               <textarea class="form-control @error('content') is-invalid  @enderror" rows="5" required name="content">
                                   {{old('content')}}
                               </textarea>

                               @error('content')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>


                       </div>

                       <br>

                       <div class="row">
                           <div class="col">
                               <label>Image</label>
                               <input type="file" name="image" required accept="image/*">

                               @error('image')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>

                       <br>

                       <div class="row">
                           <div class="col-2">
                               <button class="btn btn-success  btn-block">Add Posts</button>
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

