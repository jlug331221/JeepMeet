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
              Thanks for signing up! Before getting started, could you verify
              your email address by clicking on the link we just emailed to you?
              If you didn't receive the email, we will gladly send you another.

              <form
                @submit.prevent="submit()"
                class="d-inline"
                :disabled="form.processing"
              >
                <button
                  class="button is-link is-light mt-4"
                  v-on:click="submit()"
                  v-show="!form.processing"
                >
                  Click here to request another
                </button>

                <button
                  v-show="form.processing"
                  class="button is-rounded is-link is-light is-loading mt-4"
                ></button>
              </form>

              <Link
                href="/logout"
                method="post"
                as="button"
                class="button button-empty is-rounded mt-4"
                >Logout</Link
              >

              <Errors :errors="$page.props.errors" />
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
import Errors from '../../components/Errors';

export default {
  layout: Layout,
  components: { Errors },
  props: {
    status: String,
  },
  setup(props) {
    const form = useForm({});

    function submit() {
      form.post(route('verification.send'));
    }

    return {
      form,
      submit,
    };
  },
};
</script>