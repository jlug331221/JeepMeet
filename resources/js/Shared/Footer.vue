<template>
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <small>&copy;</small>&nbsp;<span class="footer-brand">JeepMeet</span>
        2018-{{ currentYear }}.&nbsp;All rights reserved.
      </p>

      <p><a href="#">Legal Notice</a></p>

      <p><a href="#">Privacy Statement</a></p>

      <a href="mailto:jeepmeetup@gmail.com" target="_blank">
        <span class="icon">
          <i class="far fa-envelope fa-lg envelope-contact-us"></i>
        </span>
      </a>

      <a href="https://github.com/jlug331221/JeepMeet" target="_blank">
        <span class="icon">
          <i class="fab fa-github fa-lg"></i>
        </span>
      </a>
    </div>
  </footer>
</template>

<script>
import { computed } from 'vue';
import dayjs from 'dayjs';

export default {
  setup() {
    const currentYear = computed(() => {
      return dayjs().format('YYYY');
    });

    return { currentYear };
  },
};
</script>

<style lang="scss">
@import '@/_variables.scss';

footer {
  position: relative;
  // background-image: radial-gradient(circle at 0 100%, $tertiary-site-color, #33363D);
  right: 0;
  bottom: 0;
  left: 0;
  border-top: 3px solid $secondary-site-color;
  color: #fff;
  font-size: 0.55rem;

  @media only screen and (min-width: 768px) {
    font-size: 0.65rem;
  }

  @media only screen and (min-width: 1088px) {
    font-size: 0.75rem;
  }
}

.footer {
  background-color: $footer-background-color;
  padding: 1.5rem 1.5rem 2rem 1.5rem;
}

footer a {
  color: $white-chocolate;
}

footer a:hover {
  color: $secondary-site-color;
}

footer .content p:not(:last-child) {
  margin-bottom: 0.15rem;
}

footer .envelope-contact-us {
  color: $white-chocolate !important;
}

footer .envelope-contact-us:hover {
  color: $secondary-site-color !important;
}

.footer-brand {
  font-family: $font-family-russo-one;
  color: #fff;
  font-size: 0.75rem;

  @media only screen and (min-width: 1088px) {
    font-size: 0.9rem;
  }
}
</style>