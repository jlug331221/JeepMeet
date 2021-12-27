<template>
  <Head title="Email Verification" />

  <section class="section is-medium">
    <div class="columns is-centered">
      <div
        class="
          column
          is-full-mobile
          is-three-fifths-tablet
          is-three-fifths-desktop
          is-half-widescreen
        "
      >
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">Verify Your Email Address</p>
          </header>

          <div class="card-content">
            <div class="content">
              <div
                class="notification is-info is-light"
                role="alert"
                v-if="verificationLinkSent"
              >
                A fresh verification link has been sent to your email address.
              </div>

              Before proceeding to your profile, please check your email for a
              verification link. If you did not receive the email

              <form
                @submit.prevent="submit()"
                class="d-inline"
                :disabled="form.processing"
              >
                <button
                  class="button is-link is-light mt-2"
                  v-on:click="submit()"
                >
                  Click here to request another
                </button>
              </form>

              <Link
                :href="route('logout')"
                method="post"
                class="button button-empty is-rounded"
                >Logout</Link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import Layout from '../../Shared/Layout';
import { computed } from 'vue';

export default {
  layout: Layout,
  props: {
    status: String,
  },
  setup(props) {
    const form = useForm({});

    let verificationLinkSent = computed(() => {
      return props.status === 'verification-link-sent';
    });

    function submit() {
      form.post(route('verification.send'));
    }

    return {
      form,
      submit,
      verificationLinkSent,
    };
  },
};
</script>