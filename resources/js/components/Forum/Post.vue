<template>
  <div>
    <comment-skeleton
      v-bind:skeletonCount="postComments.length"
      v-show="isLoadingPostComments"
    >
    </comment-skeleton>

    <div class="box post-box" v-show="!isLoadingPostComments">
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
                {{ convertToRelativeTime(post.created_at) }}
              </small>

              <br />

              {{ post.content }}
            </p>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a class="level-item post-likes-icon">
                <span class="icon is-small">
                  <i class="fas fa-heart"></i>
                </span>
              </a>

              <span class="level-item">{{ post.likes }}</span>
            </div>
          </nav>
        </div>
      </article>
    </div>

    <comment
      v-show="!isLoadingPostComments"
      v-for="postComment in postComments"
      :key="postComment.id"
      v-bind:commentData="postComment"
    >
    </comment>
  </div>
</template>

<script>
import Comment from './Comment';
import CommentSkeleton from './CommentSkeleton';

import { convertToRelativeTime } from '../../Utilities/relativeTime';

export default {
  name: 'post',

  props: {
    postId: Number | String,
    postTitle: String,
  },

  components: {
    CommentSkeleton,
    Comment,
  },

  data() {
    return {
      post: {},

      postComments: [],

      isLoadingPostComments: false,
    };
  },

  methods: {
    convertToRelativeTime,

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

div.level-left > a.level-item.post-likes-icon {
  margin-right: 0.25rem;
}
</style>