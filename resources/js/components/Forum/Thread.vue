<template>
  <h1 class="container title has-text-centered">
    Single thread page with ID: {{ $route.params.threadId }} and associated
    posts.
  </h1>
</template>

<script>
export default {
  name: 'thread',

  data() {
    return {
      threadPosts: [],

      isLoadingThreadPosts: false,
    };
  },

  methods: {
    getThreadData() {
      axios
        .get('/api/thread/' + this.$route.params.threadId)
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
    this.getThreadData();
  },
};
</script>

<style lang="scss" scoped>
</style>