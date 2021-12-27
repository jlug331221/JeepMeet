<template>
  <Head title="Welcome" />

  <div class="columns is-centered welcome-hero-background">
    <div class="column is-half welcome-hero-jeep-figure">
      <figure class="image mt-4">
        <svg-vue
          icon="jeep_military"
          alt="Military Jeep"
          class="welcome-hero-jeep-svg"
        />
      </figure>
    </div>
  </div>

  <section class="section">
    <div class="columns is-mobile is-centered welcome-hero-text">
      <div class="column is-full-mobile is-full-tablet is-full-desktop">
        <section class="hero">
          <div class="hero-body">
            <div class="container">
              <h1
                class="
                  title
                  is-size-3-mobile is-size-2-tablet is-size-1-desktop
                "
              >
                Welcome to <span class="brand-name-non-navbar">JeepMeet</span>
              </h1>

              <h4 class="welcome-montserrat subtitle">
                The One Stop Place to Meet Fellow Jeepers
              </h4>

              <em>
                <small>
                  <p class="welcome-montserrat welcome-small-subtitle-text">
                    No matter the time or place, JeepMeet is here to help you
                    find people that are just as enthusiastic and passionate
                    about Jeeps.
                  </p>
                </small>
              </em>
            </div>
          </div>
        </section>
      </div>
    </div>

    <div class="columns is-centered">
      <div
        class="column is-full-mobile is-one-third-tablet is-one-third-desktop"
      >
        <section class="section has-text-centered">
          <figure class="image is-96x96 welcome-small-figures">
            <svg-vue icon="map" alt="Map Location" />
          </figure>

          <h3
            class="
              welcome-h3
              has-text-weight-semibold
              is-size-6-mobile is-size-5-tablet is-size-4-desktop
            "
          >
            Schedule a JeepMeet
          </h3>
        </section>
      </div>

      <div
        class="column is-full-mobile is-one-third-tablet is-one-third-desktop"
      >
        <section class="section has-text-centered">
          <figure class="image is-96x96 welcome-small-figures">
            <svg-vue icon="roads" alt="Roads Traveled via Jeeps" />
          </figure>

          <h3
            class="
              welcome-h3
              has-text-weight-semibold
              is-size-6-mobile is-size-5-tablet is-size-4-desktop
            "
          >
            Travel to Your JeepMeet
          </h3>
        </section>
      </div>

      <div
        class="column is-full-mobile is-one-third-tablet is-one-third-desktop"
      >
        <section class="section has-text-centered">
          <figure class="image is-96x96 welcome-small-figures">
            <svg-vue icon="people" alt="Jeepers" />
          </figure>

          <h3
            class="
              welcome-h3
              has-text-weight-semibold
              is-size-6-mobile is-size-5-tablet is-size-4-desktop
            "
          >
            Meet Fellow Jeepers
          </h3>
        </section>
      </div>
    </div>
  </section>

  <section class="section is-medium welcome-whitesmoke">
    <div class="columns is-centered">
      <div
        class="
          column
          has-text-centered
          is-full-mobile is-one-half-tablet is-one-half-desktop
        "
      >
        <h3 class="is-size-6-mobile is-size-5-tablet is-size-4-desktop">
          Engage with members of the community on our
          <Link href="/forum">
            <span class="welcome-forum-text has-text-weight-bold"
              >Forum</span
            > </Link
          >.
        </h3>

        <div class="columns is-centered">
          <div
            class="
              column
              is-full-mobile is-one-third-tablet is-one-third-desktop
            "
          >
            <figure
              class="
                image
                is-96x96
                welcome-small-figures welcome-svg-margin-top
              "
            >
              <svg-vue icon="forum" alt="Forum" />
            </figure>
          </div>

          <div
            class="
              column
              is-full-mobile is-one-third-tablet is-one-third-desktop
            "
          >
            <figure
              class="
                image
                is-96x96
                welcome-small-figures welcome-svg-margin-top
              "
            >
              <svg-vue icon="online-comments" alt="Online Comments" />
            </figure>
          </div>
        </div>
      </div>

      <div
        class="
          column
          has-text-centered
          welcome-column-margin-top
          is-full-mobile is-one-half-tablet is-one-half-desktop
        "
      >
        <div v-if="!user">
          <h3 class="is-size-6-mobile is-size-5-tablet is-size-4-desktop">
            Join today and post your first JeepMeet.
          </h3>

          <Link
            class="
              button button-filled
              is-rounded
              signup-button
              welcome-signup-button
            "
            href="/register"
            ><strong>Join</strong></Link
          >
        </div>

        <div v-if="user">
          <h3 class="is-size-6-mobile is-size-5-tablet is-size-4-desktop">
            Go to your profile and build up that JeepMeet Cred!
          </h3>

          <Link
            class="
              button button-empty
              is-rounded
              signup-button
              welcome-profile-button
            "
            href="/home"
            ><strong>Profile</strong></Link
          >
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';

export default {
  layout: Layout,
  setup() {
    const user = computed(() => usePage().props.value.auth.user);

    return { user };
  },
};
</script>

<style lang="scss">
@import '@/_variables.scss';

.welcome-hero-background {
  position: relative;
  background-image: radial-gradient(
    circle at 0 100%,
    $secondary-site-color,
    $main-site-color
  );
  height: 200px;

  border-bottom-left-radius: 50% 20%;
  border-bottom-right-radius: 50% 20%;

  @media only screen and (min-width: 425px) {
    height: 300px;
  }

  @media only screen and (min-width: 768px) {
    height: 325px;
  }

  @media only screen and (min-width: 1088px) {
    height: 350px;
  }

  @media only screen and (min-width: 1200px) {
    height: 400px;
  }

  @media only screen and (min-width: 1400px) {
    height: 425px;
  }

  @media only screen and (min-width: 1600px) {
    height: 500px;
  }

  @media only screen and (min-width: 2050px) {
    height: 550px;

    .welcome-hero-jeep-svg {
      width: 45%;
    }
  }

  @media only screen and (min-width: 2310px) {
    height: 625px;
  }
}

.welcome-hero-jeep-figure {
  text-align: center;
}

.welcome-hero-jeep-svg {
  width: 50%;
}

// .welcome-hero-background:before {
//   content: '';
//   background: #fff;
//   bottom: 0;
//   left: 0;
//   right: 0;
//   position: absolute;
//   z-index: 1;
//   display: block;
// }

// .welcome-hero-background:after {
//   content: '';
//   position: absolute;
//   z-index: 0;
//   width: 100%;
//   height: 100%;
//   top: 0;
//   left: 0;
//   right: 0;
// }

.welcome-military-jeep figure {
  z-index: 2;
  position: relative;
}

.welcome-hero-text {
  text-align: center;
  word-break: keep-all;
}

.welcome-montserrat {
  font-family: $font-family-montserrat-sans-serif;
}

.welcome-small-figures {
  margin: auto;
}

.welcome-h3 {
  margin-top: 1rem;
}

.welcome-whitesmoke {
  background-color: whitesmoke;
}

span.welcome-forum-text {
  color: $green-pastel;
}

span.welcome-forum-text:hover {
  color: $tertiary-site-color;
}

.welcome-svg-margin-top {
  margin-top: 1rem;

  @media only screen and (min-width: 768px) {
    margin-top: 2rem;
  }
}

.welcome-small-subtitle-text {
  margin-top: -1rem;
}

.welcome-signup-button,
a.welcome-profile-button {
  min-width: 200px;
  margin-top: 2rem;

  @media only screen and (min-width: 768px) {
    margin-top: 5rem;
  }
}

a.welcome-profile-button,
a.welcome-profile-button:hover {
  color: #000;
}

.welcome-column-margin-top {
  margin-top: 2rem;

  @media only screen and (min-width: 768px) {
    margin-top: 0rem;
  }
}
</style>