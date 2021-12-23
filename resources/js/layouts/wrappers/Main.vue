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
export default {
    name: "BaseLayout",
    components: {
        NavBar,
        SideBar,
        Footer
    },
    mounted() {
    }
};
</script>