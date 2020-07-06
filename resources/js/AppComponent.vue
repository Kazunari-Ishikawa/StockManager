<template>
  <v-app>
    <Header :user="user" />
    <RouterView />
  </v-app>
</template>

<script>
import Header from "./components/Header";
export default {
  components: {
    Header
  },
  props: {
    user: Object
  }
};
</script>