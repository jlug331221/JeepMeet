<template>
  <header>
    <Nav />
  </header>

  <div class="main-wrapper">
    <!-- Extract to component -->
    <div
      class="columns is-mobile is-centered"
      v-show="
        $page.props.flash.success ||
        $page.props.flash.error ||
        $page.props.flash.status
      "
    >
      <div
        class="column is-three-quarters-mobile is-half-tablet is-half-desktop"
      >
        <div
          v-show="$page.props.flash.success"
          class="notification is-success flash-notification"
        >
          <button
            v-on:click="hideSuccessNotification()"
            class="delete"
          ></button>
          {{ $page.props.flash.success }}
        </div>

        <div
          v-show="$page.props.flash.status"
          class="notification is-info flash-notification"
        >
          <button v-on:click="hideStatusNotification()" class="delete"></button>
          {{ $page.props.flash.status }}
        </div>

        <div
          v-show="$page.props.flash.error"
          class="notification is-danger flash-notification"
        >
          <button v-on:click="hideErrorNotification()" class="delete"></button>
          {{ $page.props.flash.error }}
        </div>
      </div>
    </div>

    <slot />
  </div>

  <Footer />
</template>

<script>
import Nav from './Nav';
import Footer from './Footer';

export default {
  components: { Nav, Footer },
  props: {
    flash: {
      success: String,
      error: String,
    },
  },
  setup(props) {
    function hideSuccessNotification() {
      props.flash.success = '';
    }

    function hideErrorNotification() {
      props.flash.error = '';
    }

    function hideStatusNotification() {
      props.flash.status = '';
    }

    return {
      hideSuccessNotification,
      hideErrorNotification,
      hideStatusNotification,
    };
  },
};
</script>

<style lang="scss">
// This is the styling the main content of each page.
.main-wrapper {
  margin: 0 auto;
  min-height: 80vh;
}

.flash-notification {
  margin-top: 2rem;
}

.notification:not(:last-child) {
  margin-bottom: -2rem;
}
</style>