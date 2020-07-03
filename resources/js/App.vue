<template>
  <v-app>
    <Header />
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
  }
};
</script>