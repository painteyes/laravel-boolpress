<template>
    <section>
        <div class="container my-4">
            <PostsList/>
        </div>
    </section>
</template>

<script>

    import PostsList from '../components/PostsList.vue'
    
    export default ({ 
        name:'Blog',
        components: {
            PostsList,
        }
    })

</script>