<template>
  <div>
    <h1 class="title is-3">
      {{ $props.postTitle.replaceAll('_', ' ') }}
    </h1>

    <hr />

    <div
      class="block"
      v-for="postComment in postComments"
      :key="postComment.id"
    >
      {{ postComment.comment }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'post',

  props: {
    postId: Number | String,
    postTitle: String,
  },

  data() {
    return {
      postComments: [],

      isLoadingPostComments: false,
    };
  },

  methods: {
    getCommentsForPost() {
      this.isLoadingPostComments = true;

      axios
        .get('/api/post/' + this.$props.postId + '/comments')
        .then((res) => {
          this.postComments = res.data;

          this.isLoadingPostComments = false;
        })
        .catch((err) => {
          console.error(
            'There appears to be a problem fetching the post comments...',
            err
          );
        });
    },
  },

  mounted() {
    this.getCommentsForPost();
  },
};
</script>

<style lang="scss" scoped>
@import '~@/_variables.scss';
</style>