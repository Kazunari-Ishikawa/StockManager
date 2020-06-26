<template>
  <v-app>
    <Header />
    <v-main>
      <ExampleComponent />
    </v-main>
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