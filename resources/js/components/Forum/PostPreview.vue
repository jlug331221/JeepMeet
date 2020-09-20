  <template>
  <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <b-image src="/img/128x128.png" alt="data.user.username" ratio="6by6" :rounded="true"></b-image>
      </p>
    </figure>
    <div class="media-content">
      <div class="post-content content">
        <p>
          <strong class="post-thread-link">{{ data.thread.title }}</strong>
          <br />
          <strong class="post-title">{{ data.title }}</strong>
          <small class="post-by-user-text">by @{{ data.user.username }}</small>
          <b-tooltip
            class="post-date-tooltip"
            :label="data.created_at"
            type="is-dark"
            position="is-top"
            :animated="true"
          >
            <small>{{ convertToRelativeTime(data.created_at) }}</small>
          </b-tooltip>
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
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

export default {
  name: 'post-preview',

  props: {
    data: Object,
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
    font-size: 1.325rem;
    color: $secondary-site-color;
  }

  & .post-by-user-text {
    font-family: $font-family-montserrat-sans-serif;
  }

  & .post-date-tooltip {
    cursor: pointer;
  }
}
</style>
