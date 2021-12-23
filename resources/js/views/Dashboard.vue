<template>
<div>
    <span v-if="role==1"><Supervisor /></span>
    <span v-if="role==2"><Staffs /></span>
    <span v-if="role==3"><Branchadmin /></span>
    <button type="button" class="btn btn-sm btn-primary" @click="logout">LogOut</button>
</div>
</template>
<script>
    import Supervisor from '../views/supervisor.vue'
    import Staffs from '../views/Staff.vue'
    import Branchadmin from '../views/branchadmin.vue'
    export default {
        components: {
            Supervisor,
            Staffs,
            Branchadmin
        },
        data: () => {
            return {
                role: ''
            }
        },
        methods: {
            async logout() {
                await this.$store.dispatch("logout");
                this.$router.replace({ name: "login" });
            }
        },
        async mounted() {
            this.$Progress.start()
            await this.$store.dispatch('getUser').then(()=>{
                this.$Progress.finish()
                this.role = this.$store.state.Auth.role
            }).catch((err) => {
                this.$Progress.fail()
                this.$router.replace({ name: "login" });
            })
        }
    }
</script>