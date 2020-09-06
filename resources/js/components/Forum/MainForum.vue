<template>
  <div>
    <section class="section container" style="position: relative;">
      <div class="columns">
        <div class="column is-three-quarters">
          <div v-show="!isLoading">
            <h1 class="title">Here are the latests posts...</h1>

            <ul>
              <li v-for="post in posts" :key="post.id">
                <h1 class="subtitle" style="font-weight: 800;">{{ post.title }}</h1>
                {{ post.content }}
                <br />
                <br />
              </li>
            </ul>
          </div>

          <b-button loading v-show="isLoading">Loading</b-button>
        </div>

        <div class="column">
          <h3 class="subtitle">Have a look at more topics</h3>
        </div>
      </div>
    </section>
    <!-- Following is not working ?? -->
    <!-- <b-loading :is-full-page="isFullPage" v-show="isLoading"></b-loading> -->
  </div>
</template>

<script>
export default {
  name: "main-forum",

  data() {
    return {
      posts: [],

      isLoading: false,
      isFullPage: true,
    };
  },

  methods: {
    fetchPosts() {
      this.isLoading = true;

      axios
        .get("/api/recent-posts")
        .then((res) => {
          this.isLoading = false;

          this.posts = res.data;

          console.log("Posts have been loaded!");
        })
        .catch((err) => {});
    },
  },

  mounted() {
    this.fetchPosts();
  },
};
</script>

<style lang="scss">
</style>