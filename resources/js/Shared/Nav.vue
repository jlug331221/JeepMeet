<template>
  <nav
    class="navbar is-fixed-top is-transparent"
    role="navigation"
    aria-label="main navigation"
  >
    <div class="container">
      <div class="navbar-brand">
        <Link href="/"><h1 class="brand-name navbar-item">JeepMeet</h1></Link>

        <a
          role="button"
          class="navbar-burger burger"
          :class="{ 'is-active': showNav }"
          @click="showNav = !showNav"
          aria-label="menu"
          aria-expanded="false"
          data-target="jeepup-navbar"
        >
          <span aria-hidden="true"></span>
          <span class="small-burger" aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div
        id="jeepup-navbar"
        class="navbar-menu"
        :class="{ 'is-active': showNav }"
      >
        <div class="navbar-start">
          <Link
            v-if="user"
            class="navbar-item"
            href="/home"
            @click="showNav = !showNav"
          >
            <strong>Dashboard</strong>
          </Link>

          <Link class="navbar-item" href="/events" @click="showNav = !showNav">
            <strong>Events</strong>
          </Link>

          <Link class="navbar-item" href="/forum" @click="showNav = !showNav">
            <strong>Forum</strong>
          </Link>

          <Link class="navbar-item" href="/news" @click="showNav = !showNav">
            <strong>News</strong>
          </Link>

          <Link class="navbar-item" href="/about" @click="showNav = !showNav">
            <strong>About</strong>
          </Link>

          <Link class="navbar-item" href="/contact" @click="showNav = !showNav">
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
                  @click="showNav = !showNav"
                  ><strong>Login</strong>
                </Link>
                <Link
                  class="button button-filled is-rounded button-filled-hover"
                  href="/register"
                  @click="showNav = !showNav"
                  ><strong>Join</strong>
                </Link>
              </div>
              <div v-if="user">
                <Link
                  class="button button-filled is-rounded button-filled-hover"
                  href="/logout"
                  @click="showNav = !showNav"
                >
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
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

export default {
  setup() {
    let showNav = ref(false);

    const user = computed(() => usePage().props.value.auth.user);

    return { showNav, user };
  },
};
</script>

<style lang="scss">
@import '@/_variables.scss';
@import '@/Components/_button.scss';

nav {
  text-align: center;
}

.brand-name {
  font-size: 1.3rem;
  font-family: $font-family-russo-one;
  color: $white-chocolate;

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
    color: $white-chocolate;
  }
}

a.navbar-item:hover,
a.navbar-link:hover {
  color: $tertiary-site-color;

  @media only screen and (min-width: 1088px) {
    color: whitesmoke;
  }
}

a.navbar-item:active,
a.navbar-link:active,
a.navbar-item:focus,
a.navbar-link:focus {
  color: $tertiary-site-color;
  background-color: white;

  @media only screen and (min-width: 1088px) {
    color: $white-chocolate;
  }
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

nav .button-filled-hover:hover {
  @media only screen and (min-width: 1088px) {
    color: $white-chocolate;
    border-color: $tertiary-site-color;
  }
}
</style>