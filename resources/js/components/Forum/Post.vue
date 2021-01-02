<template>
  <div>
    <div class="box post-box">
      <article class="media">
        <div class="media-left">
          <figure class="image is-48x48">
            <i class="fas fa-user fa-2x" v-if="true"></i>

            <b-image
              src="/img/128x128.png"
              alt="User image"
              :rounded="true"
              v-else
            ></b-image>
          </figure>
        </div>
        <div class="media-content">
          <div class="content">
            <p>
              <strong v-if="post.user">
                {{ post.user.first_name }} {{ post.user.last_name }}
              </strong>
              <small v-if="post.user">@{{ post.user.username }}</small>
              <small v-if="post">
                {{ post.created_at }}
              </small>

              <br />

              {{ post.content }}
            </p>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a class="level-item" aria-label="reply">
                <span class="icon is-small">
                  <i class="fas fa-reply" aria-hidden="true"></i>
                </span>
              </a>
              <a class="level-item" aria-label="like">
                <span class="icon is-small">
                  <i class="fas fa-heart" aria-hidden="true"></i>
                </span>
              </a>
            </div>
          </nav>
        </div>
      </article>
    </div>

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
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

export default {
  name: 'post',

  props: {
    postId: Number | String,
    postTitle: String,
  },

  data() {
    return {
      post: {},

      postComments: [],

      isLoadingPostComments: false,
    };
  },

  methods: {
    convertToRelativeTime(dateTime) {
      return dayjs().to(dayjs(datetime));
    },

    getCommentsForPost() {
      this.isLoadingPostComments = true;

      axios
        .get('/api/post/' + this.$props.postId + '/comments')
        .then((res) => {
          this.post = res.data.post;

          this.postComments = res.data.comments;

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

.post-box {
  box-shadow: none;
  background-color: #f1f1f1;
}
</style>