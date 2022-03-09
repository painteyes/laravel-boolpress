<template>
    <section>
        <div class="container my-4">

            <h2>Contact us</h2>

            <h5 v-if="success" class="my-3">Congratulations, your email has been sent !</h5>
             
            <form>

                <div class="form-group mt-4">
                    <label 
                        for="name">Name
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        v-model="name"
                    > 
                </div>
                <div class="errors" v-if="errors.name">
                    <div v-for="error, index in errors.name" :key='index'>
                        <span class="error">{{error}}</span>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label 
                        for="email">Email
                    </label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        v-model="email"
                    > 
                </div>
                <div class="errors" v-if="errors.email">
                    <div v-for="error, index in errors.email" :key='index'>
                        <span class="error">{{error}}</span>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label for="message">Message</label>
                    <textarea 
                        class="form-control" 
                        rows="10" 
                        id = "message"
                        v-model="message" 
                    ></textarea>
                </div>
                <div v-if="errors.message">
                    <div v-for="error, index in errors.message" :key='index'>
                        <span class="error">{{error}}</span>
                    </div>
                </div>

                <button 
                    type="submit" 
                    @click.prevent="sendMessage" 
                    class="btn btn-success"
                >Send</button>

            </form>      
        </div>
    </section>
</template>

<script>
    
    export default ({ 
        name:'Contact',
        data: function() {
            return{
                email: '',
                name: '',
                message: '', 
                success: false,
                errors: {}
            }
        },
        methods: {
            sendMessage: function() {
                axios.post('/api/leads/store', {
                    email: this.email,
                    name: this.name,
                    message: this.message,
                }).then((response)=> {
                    if (response.data.success == true) {
                        this.email = '';
                        this.name = '';
                        this.message = '';
                        this.success = true;
                    } else {
                        this.success = false;
                        this.errors = response.data.errors;
                    }
                })
            }
        }
    })

</script>