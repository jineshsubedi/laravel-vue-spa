<template>
  <ul
    class="nav nav-pills nav-sidebar flex-column"
    data-widget="treeview"
    role="menu"
    data-accordion="false"
  >
      <li class="nav-item">
          <router-link :to="{ name: 'dashboard' }" class="nav-link"
          ><i class="nav-icon fas fa-th"></i>Dashboard</router-link
          >
      </li>
      <li class="nav-item">
          <router-link :to="{ name: 'staffs.profile' }" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>Profile</p>
          </router-link>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link" @click="logout">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
          </a>
      </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      
    };
  },
  methods: {
    async logout() {
      await this.$store.dispatch("logout");
      this.$router.replace({ name: "login" });
    }
  },
  mounted() {
    
  },
};
</script>
