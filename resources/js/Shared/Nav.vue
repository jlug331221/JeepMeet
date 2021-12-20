<template>
  <nav
    class="navbar is-fixed-top is-transparent"
    role="navigation"
    aria-label="main navigation"
  >
    <div class="container">
      <div class="navbar-brand">
        <a href="/"><h1 class="brand-name navbar-item">JeepMeet</h1></a>

        <a
          role="button"
          class="navbar-burger burger is-active"
          aria-label="menu"
          aria-expanded="false"
          data-target="jeepup-navbar"
        >
          <span aria-hidden="true"></span>
          <span class="small-burger" aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="jeepup-navbar" class="navbar-menu is-active">
        <div class="navbar-start">
          <div v-if="user">
            <Link class="navbar-item" href="/home">
              <strong>Profile</strong>
            </Link>
          </div>

          <Link class="navbar-item" href="/events">
            <strong>Events</strong>
          </Link>

          <Link class="navbar-item" href="/forum">
            <strong>Forum</strong>
          </Link>

          <Link class="navbar-item" href="/news">
            <strong>News</strong>
          </Link>

          <Link class="navbar-item" href="/about">
            <strong>About</strong>
          </Link>

          <Link class="navbar-item" href="/contact">
            <strong>Contact</strong>
          </Link>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <div v-if="!user">
                <Link
                  class="button button-empty is-rounded login-button"
                  href="/login"
                  ><strong>Login</strong>
                </Link>
                <Link
                  class="button button-filled is-rounded signup-button"
                  href="/register"
                  ><strong>Join</strong>
                </Link>
              </div>
              <div v-if="user">
                <Link class="button button-filled is-rounded" href="/logout">
                  <strong>Logout</strong>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

export default {
  setup() {
    const user = computed(() => usePage().props.value.auth.user);

    return { user };
  },
};
</script>

<style lang="scss">
@import '@/_variables.scss';

nav {
  text-align: center;
}

.brand-name {
  font-size: 1.3rem;
  font-family: $font-family-russo-one;
  color: #fff;

  @media only screen and (min-width: 768px) {
    font-size: 1.4rem;
  }

  @media only screen and (min-width: 1088px) {
    font-size: 1.6rem;
  }
}

a.navbar-item,
a.navbar-link {
  color: black;

  @media only screen and (min-width: 1088px) {
    color: #fff;
  }
}

a.navbar-item:hover,
a.navbar-link:hover {
  color: $secondary-site-color;
}

.navbar {
  background-color: $main-site-color;
}

.navbar-burger {
  color: $white-chocolate;
}

.navbar-burger:hover {
  color: $tertiary-site-color;
}

.navbar-burger span.small-burger {
  max-width: 20%;
}

nav .navbar-end .buttons {
  justify-content: center;

  @media only screen and (min-width: 1088px) {
    justify-content: flex-start;
  }
}

nav .login-button {
  @media only screen and (min-width: 1088px) {
    color: $white-chocolate;
    border-color: $tertiary-site-color;
  }
}

nav .login-button:hover {
  color: $secondary-site-color;

  @media only screen and (min-width: 1088px) {
    color: #fff;
  }
}

nav .signup-button:hover {
  @media only screen and (min-width: 1088px) {
    color: $white-chocolate;
    border-color: $tertiary-site-color;
  }
}
</style>