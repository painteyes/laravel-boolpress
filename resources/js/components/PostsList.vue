<template>
    <section class="container mt-4">
        <div class="posts">
            <h1>Posts</h1>
            <div class="row row-cols-3">
                <!-- Single post -->
                <div v-for="post in posts" :key='post.id' class="col mt-3">
                    <router-link :to="{name: 'post-details', params: {slug: post.slug}}">
                        <div class="card">
                            <div class="card-body">
                                <!-- img -->
                                <div class="thumb">
                                    <img v-if="post.cover" :src="post.cover" :alt="post.title">
                                    <img v-else src="https://shenandoahcountyva.us/bos/wp-content/uploads/sites/4/2018/01/picture-not-available-clipart-12.jpg" alt="">
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
                    </router-link>  
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