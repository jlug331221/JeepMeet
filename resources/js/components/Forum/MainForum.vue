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
            <div class="columns main-forum-topics-header">
              <div class="column">
                <h1 class="title is-2 main-forum-topics-h1-text">Topics</h1>
              </div>

              <div class="column is-narrow">
                <router-link :to="{ name: 'forum' }">
                  <button class="button is-dark is-rounded">
                    Recent Posts
                  </button>
                </router-link>
              </div>
            </div>

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
                      path:
                        '/thread/' +
                        threadTopic.id +
                        '/' +
                        threadTopic.title.replaceAll(' ', '_'),
                      params: {
                        threadId: threadTopic.id,
                        threadTitle: threadTopic.title,
                      },
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
                    <i class="fas fa-comment-alt"></i>
                  </span>
                  <strong>
                    <p class="main-forum-thread-number-of-posts">
                      {{ threadTopic.number_of_posts }}
                    </p></strong
                  >
                </div>
              </div>

              <b-loading
                :is-full-page="false"
                v-model="isLoadingThreadTopics"
                :can-cancel="false"
              ></b-loading>
            </b-notification>
          </div>
        </div>

        <div class="column is-7">
          <router-view></router-view>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import numeral from 'numeral';

export default {
  name: 'main-forum',

  data() {
    return {
      threadTopics: [],

      // threadTitlesWithoutSpaces: [],

      isLoadingThreadTopics: false,
    };
  },

  methods: {
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

            // this.threadTitlesWithoutSpaces.push(
            //   thread.threadTitle.replace(' ', '_')
            // );
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

.main-forum-topics-header {
  align-items: center;

  .main-forum-topics-h1-text {
    white-space: nowrap;
  }

  button {
    font-size: 0.85rem;

    @media only screen and (min-width: 815px) {
      font-size: 1rem;
    }
  }
}

.main-forum-topic-title {
  font-weight: 600;
  margin-bottom: 0;
}

article.notification.main-forum-topic-notification {
  padding: 1.25rem 1.5rem 1.25rem 1.5rem;

  a:not(.button):not(.dropdown-item) {
    text-decoration: none;
  }

  a:hover {
    color: $main-site-color;
  }
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
