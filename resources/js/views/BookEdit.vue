<template>
  <v-main>
    <v-container>
      <v-row>
        <SideBar />
        <v-col cols="12" sm="9">
          <v-row>
            <v-col>
              <h1>Edit Book</h1>
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-card outlined>
                <v-form class="pa-4">
                  <v-text-field v-model="name" label="Book Title"></v-text-field>

                  <v-btn class="mr-4" @click="update">変更</v-btn>
                  <v-btn @click="reset">クリア</v-btn>
                </v-form>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>

<script>
import SideBar from "../components/SideBar";

export default {
  components: {
    SideBar,
  },
  props: {
    id: Number,
  },
  data() {
    return {
      book: null,
      name: null,
    };
  },
  created() {
    this.getBook();
  },
  methods: {
    async getBook() {
      const id = this.id;
      const response = await axios.get(`/api/books/${id}`);
      console.log(response);
      this.book = response.data;
      this.name = this.book.name;
    },
    async update() {
      const id = this.id;
      const response = await axios
        .post(`/api/books/${id}/update`, {
          name: this.name,
        })
        .catch((error) => {
          return error.response;
        });
      console.log(response);

      if (response.status === 200) {
        this.reset();
        this.$router.push("/home/books");
      }
    },
    reset() {
      this.name = null;
    },
  },
};
</script>