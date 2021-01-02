<template>
  <div>
    <h1 class="title is-3">
      {{ $props.postId }}
    </h1>
  </div>
</template>

<script>
export default {
  name: 'post',

  props: {
    postId: Number,
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