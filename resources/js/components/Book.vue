<template>
  <v-card class="ma-4">
    <v-card-title>{{ book.name }}</v-card-title>
    <v-card-subtitle>3記事</v-card-subtitle>
    <v-card-text>注釈とか？</v-card-text>
    <v-card-actions>
      <v-btn text small>EDIT</v-btn>
      <v-btn text small @click="destroy">DELETE</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: {
    book: Object,
  },
  methods: {
    async destroy() {
      const id = this.book.id;
      const response = await axios
        .post(`/api/books/${id}/delete`)
        .catch((error) => {
          return error.response;
        });
      console.log(response);
      this.inform();
    },
    inform() {
      this.$emit("delete-book");
    },
  },
};
</script>