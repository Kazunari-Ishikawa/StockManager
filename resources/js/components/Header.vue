<template>
  <v-sheet color="#55c500">
    <v-toolbar class="px-sm-6" flat color="#55c500" dark>
      <v-toolbar-title>
        <RouterLink to="/">StockManager</RouterLink>
      </v-toolbar-title>

      <SearchInput />

      <v-spacer></v-spacer>

      <v-menu offset-y>
        <template v-slot:activator="{on, attrs}">
          <v-btn icon v-bind="attrs" v-on="on">
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item-group color="primary">
            <v-list-item>
              <v-list-item-title>個人設定</v-list-item-title>
            </v-list-item>
            <v-list-item @click="doLogout">
              <v-list-item-title>ログアウト</v-list-item-title>
            </v-list-item>
          </v-list-item-group>
        </v-list>
      </v-menu>
    </v-toolbar>
  </v-sheet>
</template>

<script>
import SearchInput from "./SearchInput";
export default {
  components: {
    SearchInput
  },
  methods: {
    async doLogout() {
      // const response = await axios.post("/logout").catch(error => ({}));
      // console.log(response);
    }
  }
};
</script>