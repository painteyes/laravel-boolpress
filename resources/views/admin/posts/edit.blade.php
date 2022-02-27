@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">

            <h2>Edit post</h2>

            {{-- Alert messages for errors in the form --}} 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                
            {{-- Pre-filled form to edit --}}
            <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post">
                @csrf
                @method('PUT') 

                {{-- title --}}              
                <div class="form-group">
                    <label for="title">Title</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="text" 
                        name="title" 
                        value="{{old('title', $post->title)}}"
                    >
                </div>

                {{-- category --}}
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <br>
                    <select 
                        class="form-select" 
                        id="category_id" 
                        name='category_id'
                    >
                        <option value=''>undefined</option>
                        @foreach ($categories as $category)
                            <option 
                                {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                value="{{$category->id}}" 
                            >{{$category->name}}</option>
                        @endforeach
                    <select >
                </div>

                {{-- tags --}}
                <div class="form-group">
                    <span>Tags</span>
                    @foreach ($tags as $tag)
                        <div class="form-check"> 
                            <input
                                @if ($errors->any()) 
                                {{-- If there are validation errors, looks in old() wich is an array  --}}
                                    {{in_array( $tag->id, old('tags', [])) ? 'checked' : ''}}
                                @else 
                                {{-- If there are no validation errors, looks in $post->tags wich is a collection  --}}
                                    {{($post->tags->contains($tag))  ? 'checked' : ''}}
                                @endif 
                                class="form-check-input" 
                                type="checkbox" 
                                id="tag-{{$tag->id}}" 
                                name='tags[]' 
                                value="{{$tag->id}}"
                            >
                            <label class="form-check-label" for="tag-{{$tag->id}}">
                                {{$tag->name}}
                            </label>
                        </div> 
                    @endforeach
                </div>

                {{-- content --}}
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea 
                        class="form-control" 
                        id="content" 
                        rows="10" 
                        id="description" 
                        name="content" 
                        value=""
                    >{{old('content', $post->content)}}</textarea>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-success">Save changes</button>

            </form>
        </div>
    </section>
@endsection