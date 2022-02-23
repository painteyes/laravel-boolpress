@extends('layouts.dashboard')

@section('content')
    <section class="posts">
        <div class="container">
            <h1>All posts</h1>  
            <div class="row row-cols-2">

                @foreach ($posts as $post)                 
                    <div class="col">

                        <a href ="{{ route('admin.posts.show', ['post' => $post->id]) }}">

                            <div class="card">

                                <div class="card-body">

                                    <div class="poster">
                                        <img src="https://th.bing.com/th/id/R.f258539b928797dfe621298b92c7ceb2?rik=zl88qJzgJ6cpPQ&pid=ImgRaw&r=0" alt="">
                                    </div>

                                    <div class="text-area"> 

                                        <h5 class="card-title">{{ $post->title }}</h5>               
                                        <p class="card-text">

                                            {{-- 
                                                
                                                Alternative solution 

                                            // @if (strlen($post->content) > 300)                                        
                                            //     {{ substr($post->content, 0, 300) . '...' }}                                        
                                            // @else                                         
                                            //     {{ $post->content }}                                    
                                            // @endif  
                                            
                                            --}}

                                            {{ Str::substr($post->content, 0, 200) }}...

                                            <span>Read more</span>

                                            {{-- <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="card-link">Read more</a> --}}
                                        </p>

                                    </div>                             
                                </div>
                            </div>

                        </a>

                    </div>

                @endforeach

            </div>  
        </div>
    </section>    

@endsection