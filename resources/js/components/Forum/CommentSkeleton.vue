<template>
  <div>
    <article class="media" v-for="i in $props.skeletonCount" :key="i">
      <figure class="media-left">
        <p class="image is-64x64">
          <b-skeleton circle width="64px" height="64px"></b-skeleton>
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
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
          </div>
        </nav>
      </div>
    </article>
  </div>
</template>

<script>
export default {
  name: 'comment-skeleton',

  props: {
    skeletonCount: Number,
  },

  data() {
    return {};
  },
};
</script>