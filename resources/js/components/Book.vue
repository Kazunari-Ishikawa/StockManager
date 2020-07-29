<template>
  <v-card class="ma-4">
    <v-card-title>{{ book.name }}</v-card-title>
    <v-card-subtitle>3記事</v-card-subtitle>
    <v-card-text>注釈とか？</v-card-text>
    <v-card-actions>
      <v-btn text small>EDIT</v-btn>
      <v-btn text small>DELETE</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: {
    book: Object,
  },
};
</script>