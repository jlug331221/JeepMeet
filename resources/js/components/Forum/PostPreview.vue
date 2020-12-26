<template>
  <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <i class="fas fa-user fa-3x" v-if="postData.user.avatar === ''"></i>

        <b-image
          src="/img/128x128.png"
          alt="postData.user.username"
          :rounded="true"
          v-else
        ></b-image>
      </p>
    </figure>
    <div class="media-content">
      <div class="post-content content">
        <p v-if="postData.thread">
          <strong class="post-thread-link">{{ postData.thread.title }}</strong>
        </p>
        <p class="title is-5">
          <strong class="post-title">{{ postData.title }}</strong>
        </p>
        <p class="subtitle is-6">
          by @{{ postData.user.username }}
          <small>{{ convertToRelativeTime(postData.created_at) }}</small>
        </p>
        <p>
          {{ postData.content }}
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
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

export default {
  name: 'post-preview',

  props: {
    postData: Object,
  },

  data() {
    return {};
  },

  methods: {
    convertToRelativeTime(dateTime) {
      return dayjs().to(dayjs(dateTime));
    },
  },
};
</script>

<style lang="scss" scoped>
@import '~@/_variables.scss';

.post-content {
  & .post-thread-link {
    font-size: 0.75rem;
    font-weight: 700;
  }

  & .post-title {
    color: $secondary-site-color;
  }

  & .post-by-user-text {
    font-family: $font-family-montserrat-sans-serif;
  }
}
</style>
