<template>
  <v-app>
    <Header :user="user" />
    <v-main>
      <RouterView />
    </v-main>
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