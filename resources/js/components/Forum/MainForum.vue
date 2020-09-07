<template>
  <div>
    <section class="section container" style="position: relative;">
      <div class="columns">
        <div class="column">
          <!-- <h2 class="title is-4">JeepMeet Forum</h2> -->
          <article class="message">
            <div class="message-header main-forum-message-header">
              <p>JeepMeet Forum</p>
            </div>
            <div class="message-body">
              Welcome to the JeepMeet Forum, a home for Jeepers to discuss all things Jeeps and JeepMeets.
              Feel free to post as much as you like and make new Jeep friends. More posts by you means
              more JeepMeet cred, so join the community and be part of the discussion!
            </div>
          </article>
        </div>

        <div class="column is-two-thirds">
          <h1 class="title">Recent Posts</h1>

          <article class="media" v-for="i in skeletonMedia" :key="i" v-show="isLoading">
            <figure class="media-left">
              <p class="image is-64x64">
                <b-skeleton circle width="64px" height="64px"></b-skeleton>
              </p>
            </figure>
            <div class="media-content">
              <div class="content">
                <p>
                  <b-skeleton active></b-skeleton>
                  <b-skeleton height="80px"></b-skeleton>
                </p>
              </div>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a class="level-item">
                    <span class="icon is-small">
                      <b-skeleton></b-skeleton>
                    </span>
                  </a>
                  <a class="level-item">
                    <span class="icon is-small">
                      <b-skeleton></b-skeleton>
                    </span>
                  </a>
                </div>
              </nav>
            </div>
          </article>

          <article class="media" v-for="post in posts" :key="post.id" v-show="!isLoading">
            <figure class="media-left">
              <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png" />
              </p>
            </figure>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{ post.title }}</strong>
                  <small>@jeeperUser</small>
                  <small>{{ post.created_at }}</small>
                  <br />
                  {{ post.content }}
                </p>
              </div>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a class="level-item">
                    <span class="icon is-small">
                      <i class="fas fa-reply"></i>
                    </span>
                  </a>
                  <a class="level-item">
                    <span class="icon is-small">
                      <i class="fas fa-heart"></i>
                    </span>
                  </a>
                </div>
              </nav>
            </div>
          </article>
        </div>
      </div>

      <b-loading :is-full-page="isFullPage" :active="isLoading"></b-loading>
    </section>
  </div>
</template>

<script>
// import { skeleton } from "buefy";

export default {
  name: "main-forum",

  data() {
    return {
      posts: [],

      isLoading: false,
      isFullPage: true,

      skeletonMedia: 4,
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
        })
        .catch((err) => {});
    },
  },

  mounted() {
    this.fetchPosts();
  },
};
</script>

<style lang="scss" scoped>
@import "~@/_variables.scss";

.main-forum-message-header {
  justify-content: center;
  background-color: $tertiary-site-color;
}
</style>