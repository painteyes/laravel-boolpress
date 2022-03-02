<template>
    <section class="container mt-4">
        <div class="posts">
            <h1>Posts</h1>
            <div class="row row-cols-3">
                <!-- Single post -->
                <div v-for="post in posts" :key='post.id' class="col mt-3">
                    <a href ="">
                        <div class="card">
                            <div class="card-body">
                                <!-- img -->
                                <div class="thumb">
                                    <img src="" alt="">
                                </div>
                                <!-- text content preview-->
                                <div class="text-area"> 
                                    <h5 class="card-title">{{post.title}}</h5>               
                                    <p class="card-text">
                                        {{post.content.length > 250 ? post.content.substr(0, 250) + '...' : post.content}}
                                        <span>Read more</span>
                                    </p>
                                </div> 
                            </div>
                        </div>
                    </a>
                </div>
            </div> 
        </div> 
    </section>
</template>

<script>
    export default {
        name: 'PostsList',
        data: function() {
            return {
                posts: []
            }
        },
        methods: {
            getPosts: function() {
                axios.get('/api/posts').then((response)=> {
                    this.posts = response.data.result
                });
            }
        },  
        created: function () {
            this.getPosts();
        }
    }
</script>