<template>
  <div>
    <section class="section container" style="position: relative">
      <div class="columns">
        <div class="column is-5">
          <article class="message">
            <div class="message-header main-forum-message-header">
              <p>JeepMeet Forum</p>
            </div>
            <div class="message-body">
              Welcome to the JeepMeet Forum, a home for Jeepers to discuss all
              things Jeeps and JeepMeets. Feel free to post as much as you like
              and make new Jeep friends. More posts by you means more JeepMeet
              cred, so join the community and be part of the discussion!
            </div>
          </article>

          <div class="box main-forum-box">
            <h1 class="title is-2">Topics</h1>

            <hr />

            <b-notification
              type="is-white"
              :closable="false"
              class="main-forum-topic-notification"
            >
              <div
                v-for="threadTopic in threadTopics"
                :key="threadTopic.id"
                v-show="!isLoadingThreadTopics"
                class="columns is-variable is-5 main-forum-thread-topic"
              >
                <div class="column is-9-tablet is-10-desktop">
                  <router-link
                    :to="{
                      name: 'single-thread',
                      params: { threadId: threadTopic.id },
                    }"
                  >
                    <h6 class="subtitle is-6 main-forum-topic-title">
                      {{ threadTopic.title }}
                    </h6>
                  </router-link>
                </div>

                <div
                  class="column is-3-tablet is-2-desktop main-forum-thread-number-of-posts-info"
                >
                  <span class="icon is-small">
                    <i class="fas fa-comment-dots"></i>
                  </span>
                  <strong>
                    <p class="main-forum-thread-number-of-posts">
                      {{ threadTopic.number_of_posts }}
                    </p></strong
                  >
                </div>
              </div>

              <b-loading
                :is-full-page="isFullPage"
                v-model="isLoadingThreadTopics"
                :can-cancel="false"
              ></b-loading>
            </b-notification>
          </div>
        </div>

        <div class="column is-7">
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
      </div>
    </section>
  </div>
</template>

<script>
import numeral from 'numeral';
import PostPreview from './PostPreview';

export default {
  components: {
    PostPreview,
  },

  name: 'main-forum',

  data() {
    return {
      recentPosts: [],
      threadTopics: [],

      isLoadingRecentPosts: false,
      isLoadingThreadTopics: false,
      isFullPage: false,

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

    fetchThreadTopics() {
      this.isLoadingThreadTopics = true;

      axios
        .get('/api/threads')
        .then((res) => {
          this.threadTopics = res.data;

          this.threadTopics.map((thread) => {
            thread.number_of_posts = numeral(thread.number_of_posts).format(
              '0a'
            );
          });

          this.isLoadingThreadTopics = false;
        })
        .catch((err) => {
          console.error(
            'There appears to be a problem fetch the thread topics...',
            err
          );
        });
    },
  },

  mounted() {
    this.fetchRecentPosts();

    this.fetchThreadTopics();
  },
};
</script>

<style lang="scss" scoped>
@import '~@/_variables.scss';

.main-forum-message-header {
  justify-content: center;
  background-color: $tertiary-site-color;
}

.main-forum-box {
  min-height: 40vh;

  .loading-overlay {
    min-height: $loading-overlay-min-height;
  }
}

.main-forum-topic-title {
  font-weight: 600;
  margin-bottom: 0;
}

article.notification.main-forum-topic-notification {
  padding: 1.25rem 1.5rem 1.25rem 1.5rem;
}

div.main-forum-thread-topic {
  align-items: center;

  div.main-forum-thread-number-of-posts-info {
    display: flex;
    align-items: center;

    margin-top: -1.25rem;

    @media only screen and (min-width: 769px) {
      margin-top: 0;
    }

    p.main-forum-thread-number-of-posts {
      margin-left: 0.3rem;
      font-size: 0.8rem;
    }
  }
}
</style>
