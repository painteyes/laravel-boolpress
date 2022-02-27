@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            
            <h2>New post</h2>

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

            {{-- Blank form for create --}}
            <form action="{{route('admin.posts.store')}}" method="post">
                @csrf
                @method('POST')

                {{-- title --}}
                <div class="form-group">
                    <label 
                        for="title">Title
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="text" name="title" 
                        value="{{old('title')}}"
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
                                {{old('category_id') == $category->id ? 'selected' : ''}}
                                value="{{$category->id}}" 
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- tags --}}
                <div class="form-group">
                    <span>Tags</span>
                    @foreach ($tags as $tag)
                        <div class="form-check"> 
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                id="tag-{{$tag->id}}" 
                                name='tags[]' 
                                value="{{$tag->id}}"
                                {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
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
                        id="content" 
                        name="content" 
                        value=""
                    >{{old('content')}}</textarea>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-success">Create</button>

            </form>            
        </div>
    </section>    
@endsection