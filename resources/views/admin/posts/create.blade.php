@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            <h2>New post</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif         
            <form action="{{ route('admin.posts.store' ) }}" method="post">
                @csrf
                @method('POST')
                {{-- Intert title --}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="text" name="title" value="{{old('title')}}"> 
                </div>
                {{-- Select category --}}
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <br>
                    <select class="form-select" id="category_id" name='category_id'>
                        <option value=''>undefined</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    <select >
                </div>
                {{-- Select tags --}}
                <div class="form-group">
                    <span>Tags</span>
                    @foreach ($tags as $tag)
                        <div class="form-check"> 
                            <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" name='tags[]'value="{{$tag->id}}">
                            <label class="form-check-label" for="tag-{{$tag->id}}">
                                {{$tag->name}}
                            </label>
                        </div> 
                    @endforeach
                </div>
                {{-- Insert content --}}
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="10" id="content" name="content" value="">{{old('content')}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>            
        </div>
    </section>    
@endsection