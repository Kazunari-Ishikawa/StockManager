<template>
  <v-main>
    <v-container>
      <v-row>
        <SideBar />
        <v-col cols="12" sm="9">
          <h1 @click="getUserStock">Stock List</h1>
          <template>
            <Stock v-for="stock in stocks" :key="stock.id" :stock="stock" />
          </template>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
import Stock from "../components/Stock";
import SideBar from "../components/SideBar";

export default {
  components: {
    Stock,
    SideBar,
  },
  data() {
    return {
      stocks: null,
      per_page: 10,
    };
  },
  methods: {
    async getUserStock() {
      const response = await axios
        .get(
          `https://qiita.com/api/v2/users/kazu0326/stocks?page=1&per_page=${this.per_page}`
        )
        .catch((error) => {
          return error.response;
        });
      console.log(response);
      this.stocks = response.data;
    },
  },
};
</script>