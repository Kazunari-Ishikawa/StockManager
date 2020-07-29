<template>
  <v-main>
    <v-container>
      <v-row>
        <SideBar />
        <v-col cols="12" sm="9">
          <h1>Book List</h1>
          <v-row>
            <v-col cols="6" sm="4">
              <!-- <Book v-for="book in books" :key="book.id" :book="book" /> -->
              <Book />
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
import SideBar from "../components/SideBar";
import Book from "../components/Book";

export default {
  components: {
    SideBar,
    Book,
  },
  data() {
    return {
      books: null,
    };
  },
  methods: {
    async getBooks() {
      const response = await axios.get();
    },
  },
};
</script>