<template>
  <div>
    <h1 class="title is-3">Recent Posts</h1>

    <hr />

    <post-skeleton
      v-bind:skeletonCount="recentPosts.length"
      v-show="isLoadingRecentPosts"
    ></post-skeleton>

    <post-preview
      v-for="post in recentPosts"
      :key="post.id"
      v-show="!isLoadingRecentPosts"
      v-bind:postData="post"
    />
  </div>
</template>

<script>
import PostPreview from './PostPreview';
import PostSkeleton from './PostSkeleton';

export default {
  name: 'recent-posts',

  components: {
    PostPreview,
    PostSkeleton,
  },

  data() {
    return {
      recentPosts: [],

      isLoadingRecentPosts: false,
    };
  },

  methods: {
    fetchRecentPosts() {
      this.isLoadingRecentPosts = true;

      axios
        .get('/api/recent-posts')
        .then((res) => {
          this.recentPosts = res.data;

          this.isLoadingRecentPosts = false;
        })
        .catch((err) => {
          console.error(
            'There appears to be a problem fetching the recent posts...',
            err
          );
        });
    },
  },

  mounted() {
    this.fetchRecentPosts();
  },
};
</script>

<style lang="scss" scoped>
@import '~@/_variables.scss';
</style>
