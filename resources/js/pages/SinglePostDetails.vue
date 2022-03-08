<template>
    <section>
        <div class="container my-4">

            <div v-if="singlePost.cover" class="post-cover"> 
                <img :src="singlePost.cover" :alt="singlePost.cover.title">
            </div>   
            
            <h1>{{singlePost.title}}</h1>
            <div v-if='singlePost.category'>
                Cateogry: {{singlePost.category.name}}
            </div>
            <div v-if='singlePost.tags.length > 0'>
                Tags: {{singlePost.tags.name}}
            </div>
            <p>{{singlePost.content}}</p>
        </div>
    </section>
</template>

<script>
 
    export default ({ 
        name:'SinglePostDetails',
        data: function() {
            return {
                singlePost: []
            }
        },
        methods: {
            getPost() {
                axios.get('/api/posts/' + this.$route.params.slug).then((response)=>{
                    if (response.data.success) {
                        this.singlePost = response.data.result        
                    } else {
                        this.$router.push({name: 'page-not-found'})
                    }
                })
            }
        },
        created: function(){
            this.getPost();
        }
    })

</script>