<template>
  <div class="box comment-box">
    {{ commentData.comment }}
  </div>
</template>

<script>
export default {
  name: 'comment',

  props: {
    commentData: Object,
  },

  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
@import '~@/_variables.scss';

.comment-box {
  box-shadow: none;
  background-color: #f1f1f1;
}
</style>