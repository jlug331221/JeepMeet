<template>
  <div>
    <h1 class="title is-3">
      {{ $props.threadTitle }}
    </h1>

    <hr />

    <post-skeleton
      v-bind:skeletonCount="threadPosts.length"
      v-show="isLoadingThreadPosts"
    ></post-skeleton>

    <div v-show="!isLoadingThreadPosts">
      <post-preview
        v-for="post in threadPosts"
        :key="post.id"
        v-show="!isLoadingThreadPosts"
        v-bind:postData="post"
      />
    </div>
  </div>
</template>

<script>
import PostPreview from './PostPreview';
import PostSkeleton from './PostSkeleton';

export default {
  name: 'thread',

  props: {
    threadId: Number,
    threadTitle: String,
  },

  components: {
    PostPreview,
    PostSkeleton,
  },

  data() {
    return {
      currentThreadId: this.$props.threadId,

      threadPosts: [],

      isLoadingThreadPosts: false,
    };
  },

  methods: {
    getPostsForThread() {
      this.isLoadingThreadPosts = true;

      axios
        .get('/api/thread/posts/' + this.$props.threadId)
        .then((res) => {
          this.threadPosts = res.data;

          this.isLoadingThreadPosts = false;
        })
        .catch((err) => {
          console.error(
            'There appears to be a problem fetching the thread posts...',
            err
          );
        });
    },
  },

  mounted() {
    this.getPostsForThread();
  },

  updated() {
    if (this.currentThreadId !== this.$props.threadId) {
      this.currentThreadId = this.$props.threadId;

      this.getPostsForThread();
    }
  },
};
</script>

<style lang="scss" scoped>
@import '~@/_variables.scss';
</style>