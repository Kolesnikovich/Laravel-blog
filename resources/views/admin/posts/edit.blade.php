@extends('admin.layouts.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit "{{$post->title}}":</h3>
        </div>


        <form role="form" method="post" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Reference</label>
                    <textarea id="description" name="description" class="form-control @error('description')is-invalid @enderror" rows="3" placeholder="Enter text" >{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" placeholder="Enter text">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Select category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $key => $val)
                            <option value="{{ $key }}" @if($key == $post->category_id) selected @endif>{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                        @foreach($tags as $key => $val)
                            <option value="{{ $key }}" @if(in_array($key, $post->tags->pluck('id')->all())) selected @endif>{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail upload</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                        </div>
                    </div>
                    <div><img src="{{ $post->getImage() }}" alt="img" class="img-thumbnail mt-2" style="max-width: 500px"></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
@endsection
