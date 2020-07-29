<template>
  <v-main>
    <v-container>
      <v-row>
        <SideBar />
        <v-col cols="12" sm="9">
          <v-row>
            <v-col>
              <h1>Book List</h1>
            </v-col>
            <v-spacer></v-spacer>
            <v-col>
              <v-btn color="primay" to="/home/books/new">NEW</v-btn>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" sm="4">
              <template v-if="!isLoading">
                <Book v-for="book in books" :key="book.id" :book="book" />
              </template>
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
      isLoading: false,
      books: null,
    };
  },
  created() {
    this.getBooks();
  },
  methods: {
    async getBooks() {
      this.isLoading = true;
      const response = await axios.get("/api/books").catch((error) => {
        return error.response;
      });
      console.log(response);

      if (response.status === 200) {
        this.books = response.data;
      }
      this.isLoading = false;
    },
  },
};
</script>