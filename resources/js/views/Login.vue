<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <Errors type="danger" v-if="errors" :content="errors" @close="errors=null" />
                        <form @submit.prevent="submitLogin">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input v-model="form.email" type="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input v-model="form.password" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" v-model="form.remember">

                                        <label class="form-check-label" for="remember">
                                            Remeber Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Errors from '../components/Errors.vue';
    export default {
        components: {
            Errors
        },
        data: () => {
            return {
                form: {
                    email: '',
                    password: '',
                    remember: false
                },
                errors : null ,
                busy : false ,
            }
        },
        methods: {
            async submitLogin()
            {
                this.busy = true ;
                this.errors = null
                try{
                    await this.$store.dispatch('login', this.form)
                    this.$router.push({name: 'dashboard'})
                }catch(e)
                {
                    this.errors = e.data
                }
                this.busy = false ;
            },
        },
    }
</script>