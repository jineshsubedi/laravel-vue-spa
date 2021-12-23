<style>
.brand-link .brand-image {
  float: none !important;
  max-height: 50px;
}
</style>
<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <router-link :to="{ name: 'dashboard' }" class="brand-link">
      <img
        src="../../assets/rolling-nexus.png"
        alt="Rolling Nexus"
        class="brand-image"
        style="opacity: 0.8"
      />
      <br />
    </router-link>

    <div class="sidebar">
      <a href="">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img
              :src="this.$store.state.Auth.user.image"
              class="img-circle elevation-2"
              alt="User Image"
            />
          </div>
          <div class="info">
            <a href="#" class="d-block">{{this.$store.state.Auth.user.name}}</a>
          </div>
        </div>
      </a>
      <nav class="mt-2" v-if="role == 2">
        <StaffSideBar />
      </nav>
      <nav class="mt-2" v-if="role == 1">
        <SupervisorSideBar />
      </nav>
      <nav class="mt-2" v-if="role == 3">
        <BranchAdminSideBar />
      </nav>
    </div>
  </aside>
</template>

<script>
import StaffSideBar from './StaffSideBar.vue'
import SupervisorSideBar from './SupervisorSideBar.vue'
import BranchAdminSideBar from './BranchAdminSideBar.vue'
export default {
  components: {
    StaffSideBar,
    SupervisorSideBar,
    BranchAdminSideBar,
  },
  data() {
    return {
      role: '',
    };
  },
  methods: {
    async logout() {
        await this.$store.dispatch("logout");
        this.$router.replace({ name: "login" });
    }
  },
  mounted() {
    console.log(this.$store.state.Auth.role)
    this.role = this.$store.state.Auth.role
  },
};
</script>
