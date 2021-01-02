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
      <div class="post-preview-post-content content">
        <p v-if="postData.thread">
          <router-link
            :to="{
              name: 'single-thread',
              params: {
                threadId: postData.thread.id,
                threadTitle: postData.thread.title,
              },
            }"
          >
            <strong class="post-thread-link">{{
              postData.thread.title
            }}</strong>
          </router-link>
        </p>
        <p class="title is-5">
          <router-link
            :to="{
              name: 'post',
              params: {
                postId: postData.id,
              },
            }"
            class="post-title-link"
          >
            <strong class="post-title">{{ postData.title }}</strong>
          </router-link>
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
          <a class="level-item post-preview-likes-icon">
            <span class="icon is-small">
              <i class="fas fa-heart"></i>
            </span>
          </a>

          <span class="level-item">{{ postData.likes }}</span>
        </div>

        <div class="level-right">
          <span class="level-item icon is-small post-preview-comment-icon">
            <i class="far fa-comment-dots"></i>
          </span>

          <span class="level-item">{{ postData.comments_count }}</span>
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

.post-preview-post-content {
  & .post-thread-link {
    font-size: 0.75rem;
    font-weight: 700;
  }

  & .post-title {
    color: $tertiary-site-color;
  }

  & .post-by-user-text {
    font-family: $font-family-montserrat-sans-serif;
  }

  & a.post-title-link:hover {
    text-decoration: underline;
    color: $secondary-site-color;
  }
}

span.level-item.icon.is-small.post-preview-comment-icon {
  margin-right: 0.25rem;
}

div.level-left {
  a.level-item.post-preview-likes-icon {
    margin-right: 0.25rem;
  }
}
</style>
