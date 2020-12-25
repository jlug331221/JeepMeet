<template>
  <div>
    <h1 class="title is-2">Recent Posts</h1>

    <article
      class="media"
      v-for="recentPost in recentPosts"
      :key="recentPost.title"
      v-show="isLoadingRecentPosts"
    >
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

export default {
  name: 'recent-posts',

  components: {
    PostPreview,
  },

  data() {
    return {
      recentPosts: [],

      isLoadingRecentPosts: false,

      skeletonMedia: 0,
    };
  },

  methods: {
    fetchRecentPosts() {
      this.isLoadingRecentPosts = true;

      axios
        .get('/api/recent-posts')
        .then((res) => {
          this.recentPosts = res.data;

          this.skeletonMedia = this.recentPosts.length;

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
