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
                class="main-forum-thread-topic"
              >
                <h6 class="subtitle is-6 main-forum-topic-title">
                  {{ threadTopic.title }}
                </h6>
                <span class="icon is-small">
                  <i class="fas fa-eye"></i>
                </span>
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
            v-for="i in skeletonMedia"
            :key="i"
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

      skeletonMedia: 4,
    };
  },

  methods: {
    fetchRecentPosts() {
      this.isLoadingRecentPosts = true;

      axios
        .get('/api/recent-posts')
        .then((res) => {
          this.recentPosts = res.data;

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

.main-forum-thread-topic {
  display: flex;
  justify-content: space-between;

  .main-forum-topic-title {
    font-weight: 600;
  }
}

article.notification.main-forum-topic-notification {
  padding: 0;
}
</style>
