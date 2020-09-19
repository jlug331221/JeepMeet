<template>
  <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <img src="https://bulma.io/images/placeholders/128x128.png" />
      </p>
    </figure>
    <div class="media-content">
      <div class="post-content content">
        <p>
          <strong class="post-thread-link">{{ data.thread.title }}</strong>
          <br />
          <strong class="post-title">{{ data.title }}</strong>
          <small>@{{ data.user.username }}</small>
          <small>{{ data.created_at }}</small>
          <br />
          {{ data.content }}
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
</template>

<script>
export default {
  name: "post",

  props: {
    data: Object,
  },

  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
@import "~@/_variables.scss";

.post-content {
  & .post-thread-link {
    font-size: 0.75rem;
    font-weight: 700;
  }

  & .post-title {
    font-size: 1.325rem;
    color: $secondary-site-color;
  }
}
</style>
