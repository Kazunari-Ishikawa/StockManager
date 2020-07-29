<template>
  <v-card>
    <v-card-title>タイトル</v-card-title>
    <v-card-text>注釈とか？</v-card-text>
    <v-card-actions>
      <v-btn text>EDIT</v-btn>
      <v-btn text>DELETE</v-btn>
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