<template>
  <header>
    <Nav />
  </header>

  <div class="main-wrapper">
    <FlashNotifications
      v-model:success="$page.props.flash.success"
      v-model:error="$page.props.flash.error"
      v-model:status="$page.props.flash.status"
      @hide="hideNotification"
    />

    <!-- Component content -->
    <slot />
  </div>

  <Footer />
</template>

<script>
import Nav from './Nav';
import Footer from './Footer';
import FlashNotifications from '../components/FlashNotifications';

export default {
  components: { Nav, Footer, FlashNotifications },
  props: {
    flash: {
      success: String,
      status: String,
      error: String,
    },
  },
  setup(props) {
    function hideNotification() {
      props.flash.success = '';
      props.flash.error = '';
      props.flash.status = '';
    }

    return {
      hideNotification,
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
</style>