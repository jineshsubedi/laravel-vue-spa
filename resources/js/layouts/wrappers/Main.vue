<template>
  <div class="wrapper">
    <NavBar />
    <SideBar />

    <div class="content-wrapper">
      <slot name="header"></slot>

      <div class="content">
        <div class="container-fluid">
          <slot></slot>
        </div>
      </div>
    </div>
    
    <Footer />
  </div>
</template>

<script>
import NavBar from "../components/NavBar";
import SideBar from "../components/SideBar";
import Footer from "../components/Footer";
import Auth from "../../endpoints/Auth";
export default {
    name: "BaseLayout",
    components: {
        NavBar,
        SideBar,
        Footer
    },
    async mounted() {
      try {
        const resp = await Auth.getUser()
        if(this.$store.state.Auth.role != resp.data.data.staffType)
        {
          await this.$store.dispatch("logout");
          this.$router.replace({ name: "login" });
        }
      } catch (error) {
        
      }
    }
};
</script>