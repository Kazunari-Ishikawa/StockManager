<template>
  <v-main>
    <v-container>
      <v-row>
        <SideBar />
        <v-col cols="12" sm="9">
          <v-row>
            <v-col>
              <h1>Book Create</h1>
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-card outlined>
                <v-form class="pa-4">
                  <v-text-field v-model="name" label="Book Title"></v-text-field>

                  <v-btn class="mr-4" @click="submit">作成</v-btn>
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
  data() {
    return {
      name: null,
    };
  },
  created() {},
  methods: {
    async submit() {
      const response = await axios
        .post("/api/books", {
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