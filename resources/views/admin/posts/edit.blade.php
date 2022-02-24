@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            <h2>Edit post</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('PUT')               
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="text" name="title" value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <br>
                    <select class="form-select" id="category_id" name='category_id'>
                        <option value=''>Undefined</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    <select >
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="10" id="description" name="content" value="">{{ old('content', $post->content) }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Save changes</button>
            </form>
        </div>
    </section>
@endsection