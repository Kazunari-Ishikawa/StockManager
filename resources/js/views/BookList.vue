<template>
  <v-main>
    <v-container>
      <v-row>
        <SideBar />
        <v-col cols="12" sm="9">
          <h1>Book List</h1>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
import SideBar from "../components/SideBar";
export default {
  components: {
    SideBar,
  },
  data() {
    return {};
  },
};
</script>