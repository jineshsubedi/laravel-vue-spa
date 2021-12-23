<template>
<base-layout>
    <template v-slot:header>
      <PageHeader :title="title" :breadcrumbs="breadcrumbs"></PageHeader>
    </template>
    <template v-slot:default>
      <h1>Dashboard</h1>
    </template>
</base-layout>

</template>
<script>
    import PageHeader from "../layouts/components/PageHeader";
    export default {
        components: {
            PageHeader
        },
        data: () => {
            return {
                title: "Dashboard",
                breadcrumbs: [
                    {
                        title: "Home",
                        link: "/",
                    },
                    {
                        title: "Dashboard",
                        link: "",
                    },
                ],
            }
        },
        methods: {
            async logout() {
                await this.$store.dispatch("logout");
                this.$router.replace({ name: "login" });
            }
        },
        mounted() {
        }
    }
</script>