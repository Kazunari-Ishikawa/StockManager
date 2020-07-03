<template>
  <v-sheet color="#55c500">
    <v-toolbar class="px-sm-6" flat color="#55c500" dark>
      <v-toolbar-title class="mr-sm-10 mr-3 stockmanager">
        <RouterLink to="/">StockManager</RouterLink>
      </v-toolbar-title>
      <v-toolbar-items class="username">UserName</v-toolbar-items>

      <v-spacer></v-spacer>

      <template>
        <!-- <v-toolbar-items>
          <v-btn depressed class="login">Qiitaで登録/ログイン</v-btn>
        </v-toolbar-items>-->

        <v-menu offset-y>
          <template v-slot:activator="{on, attrs}">
            <v-btn icon v-bind="attrs" v-on="on">
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </template>
          <v-list>
            <v-list-item-group color="primary">
              <v-list-item>
                <v-list-item-title>
                  <a href="/login/qiita" class="login">Qiitaで登録/ログイン</a>
                </v-list-item-title>
              </v-list-item>
              <v-list-item>
                <v-list-item-title>個人設定</v-list-item-title>
              </v-list-item>
              <v-list-item @click="doLogout">
                <v-list-item-title>ログアウト</v-list-item-title>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-menu>
      </template>
    </v-toolbar>
  </v-sheet>
</template>

<script>
export default {
  components: {
    // SearchInput
  },
  methods: {
    async doLogout() {
      // const response = await axios.post("/logout").catch(error => ({}));
      // console.log(response);
    }
  }
};
</script>

<style scoped lang="scss">
.stockmanager {
  font-size: 28px;
  > a {
    color: white;
  }
}
.login {
  text-transform: none;
}
.username {
  align-items: center;
}
</style>