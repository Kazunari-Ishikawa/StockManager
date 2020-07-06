<template>
  <v-container>
    <v-row>
      <v-col>
        <v-card>
          <v-card-text>Hello Vuetify!</v-card-text>
          <v-divider></v-divider>
          <v-card-actions>
            <v-btn>いいね！</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <Stock />
        <Stock />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Stock from "./Stock";

export default {
  components: {
    Stock
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
