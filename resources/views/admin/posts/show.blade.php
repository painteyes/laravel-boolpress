@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="card">        
            <div class="card-body">

                {{-- slug --}}
                <div class="mb-2">Slug: {{$post->slug}}</div> 

                {{-- cover image --}}
                <div class="cover"> 
                    @foreach ($recipes as $recipe)
                        @if ($recipe['title'] == $post->title)
                            <img src="{{ $recipe['img'] }}" alt="">
                        @endif
                    @endforeach 
                </div>

                {{-- category  --}}
                <div class="mt-2">Category: {{$post->category ? $post->category->name : 'undefined'}}</div> 

                {{-- tags --}}
                <div class="mt-2">Tags: 
                    @forelse ($post->tags as $tag)
                        {{$tag->name}}{{$loop->last ? '' : ', '}}
                    @empty
                        no tags
                    @endforelse
                </div> 

                {{-- title --}}
                <h4 class="card-title mt-3">{{$post->title}}</h4>   
                
                {{-- textual content --}}
                <p class="card-text mt-3 mb-4">{{ $post->content }}</p>

                {{-- Actions --}}
                <div class="actions d-flex align-items-center justify-content-center">

                    {{-- edit --}}
                    <a 
                        href="{{route('admin.posts.edit', ['post' => $post->id])}}" 
                        type="button" 
                        class="btn btn-secondary m-1" 
                        data-toggle="button" 
                        aria-pressed="false" 
                        autocomplete="off"
                    >Edit</a>

                    {{-- delete --}}
                    <form 
                        action="{{route('admin.posts.destroy', ['post' => $post->id])}}" 
                        method="post"
                    >
                        @csrf
                        @method('DELETE')        
                        <button class="btn btn-danger m-1" type="submit">Delete</button>
                    </form>  

                    {{-- go to index --}}
                    <a 
                        href="{{route('admin.posts.index')}}" 
                        class="btn btn-dark m-1"
                    >Back to all posts</a> 

                </div>
            </div>            
        </div>
    </section>
@endsection