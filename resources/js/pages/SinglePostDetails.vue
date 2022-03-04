<template>
    <section>
        <div class="container my-4">
            <h1>{{singlePost.title}}</h1>
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
                   this.singlePost = response.data.result 
                   console.log(response.data )               
                })
            }
        },
        created: function(){
            this.getPost();
        }
    })

</script>