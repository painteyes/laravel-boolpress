@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="card">        
            <div class="card-body">
                <div class="">
                    <img src="https://i.pinimg.com/originals/26/22/cb/2622cbabed20dafc32063731178b934b.jpg" alt="">
                </div>
                <div class="mt-2">Slug: {{$post->slug}}</div>   
                <div class="mt-2">Category: {{$post->category ? $post->category->name : 'undefined'}}</div> 
                <h4 class="card-title mt-3">{{$post->title}}</h4>        
                <p class="card-text mt-3 mb-4">{{ $post->content }}</p>
                <div class="actions d-flex align-items-center justify-content-center">
                    <a href="{{route('admin.posts.edit', ['post' => $post->id])}}" type="button" class="btn btn-secondary m-1" data-toggle="button" aria-pressed="false" autocomplete="off">
                        Edit 
                    </a>    
                    <form action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                        @csrf
                        @method('DELETE')        
                        <button class="btn btn-danger m-1" type="submit">Delete</button>
                    </form>  
                    <a href="{{route('admin.posts.index')}}" class="btn btn-dark m-1">Back to all posts</a>  
                </div>      
            </div>            
        </div>
    </section>
@endsection