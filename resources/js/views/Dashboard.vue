<template>
    <div>Dashboard</div>
    <button type="button" class="btn btn-sm btn-primary" @click="logout">LogOut</button>
</template>
<script>
    export default {
        methods: {
            async logout() {
                await this.$store.dispatch("logout");
                this.$router.replace({ name: "login" });
            }
        },
    }
</script>