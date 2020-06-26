<template>
  <v-sheet color="#55c500">
    <v-toolbar class="px-sm-6" flat color="#55c500" dark>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
      <v-toolbar-title>
        <a href="/">StockManager</a>
      </v-toolbar-title>

      <SearchInput />

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-toolbar>
  </v-sheet>
</template>

<script>
import SearchInput from "./SearchInput";
export default {
  components: {
    SearchInput
  }
};
</script>