<template>
    <div class="login-page" style="min-height: 496.781px">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a ><b>Rolling</b>Access</a>
                </div>
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div class="form-group text-center" v-if="errors.message != ''">
                        <span id="" class="error invalid-feedback show" >{{errors.message}}</span>
                    </div>
                    <form @submit.prevent="submitLogin">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" v-model="form.email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" v-model="form.password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    &nbsp;Remember Me
                                </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <!-- <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                    </div> -->
                <!-- /.social-auth-links -->
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        components: {
        },
        data: () => {
            return {
                form: {
                    email: '',
                    password: '',
                    remember: false
                },
                errors : {
                    message: ''
                },
            }
        },
        methods: {
            async submitLogin()
            {
                this.$Progress.start()
                try{
                    await this.$store.dispatch('login', this.form)
                    this.$router.push({name: 'dashboard'})
                    
                }catch(e)
                {
                    this.$Progress.fail()
                    this.errors = e.data
                }
                this.$Progress.finish()
            },
        },
    }
</script>
<style>
.invalid-feedback{
    display: block !important;
}
</style>