<template>
  <v-app>
    <Header />
    <ExampleComponent />
  </v-app>
</template>

<script>
import ExampleComponent from "./components/ExampleComponent.vue";
import Header from "./components/Header";
export default {
  components: {
    Header,
    ExampleComponent
  }
};
</script>