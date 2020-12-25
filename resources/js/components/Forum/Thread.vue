<template>
  <div>
    <h1 class="container title has-text-centered">
      Single thread page with ID: {{ $route.params.threadId }} and associated
      posts.
    </h1>

    <section class="container section">
      <div v-for="post in threadPosts" :key="post.id">
        {{ post.title }}
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'thread',

  data() {
    return {
      threadId: this.$route.params.threadId,

      threadPosts: [],

      isLoadingThreadPosts: false,
    };
  },

  methods: {
    getPostsForThread() {
      this.isLoadingThreadPosts = true;

      axios
        .get('/api/thread/posts/' + this.threadId)
        .then((res) => {
          this.threadPosts = res.data;

          this.isLoadingThreadPosts = false;
        })
        .catch((err) => {
          console.error(
            'There appears to be a problem fetch the thread posts...',
            err
          );
        });
    },
  },

  mounted() {
    this.getPostsForThread();
  },

  updated() {
    if (this.threadId !== this.$route.params.threadId) {
      this.threadId = this.$route.params.threadId;

      this.getPostsForThread();
    }
  },
};
</script>

<style lang="scss" scoped>
@import '~@/_variables.scss';
</style>