<template>
  <v-col cols="12" sm="3">
    <v-card outlined>
      <v-list dense flat>
        <v-subheader>MENU</v-subheader>
        <v-list-item-group v-model="model" color="primary">
          <v-list-item v-for="(item, i) in items" :key="i" :to="item.link">
            <v-list-item-content v-text="item.text"></v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
      <v-divider></v-divider>

      <v-list>
        <v-list-item-group>
          <v-list-item>
            <v-list-item-content>あとで見る</v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>JS参考</v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-card>
  </v-col>
</template>

<script>
export default {
  data() {
    return {
      model: 1,
      items: [
        { text: "HOME", link: "/home" },
        { text: "Book List", link: "/home/books" },
      ],
    };
  },
};
</script>