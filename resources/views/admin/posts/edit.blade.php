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
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="10" id="description" name="content" value="">{{ old('content',$post->content) }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </section>
@endsection