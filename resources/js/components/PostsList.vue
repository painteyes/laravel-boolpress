<template>
    <section class="container">
        <h1>Posts</h1>
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div> -->

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