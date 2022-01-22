<template>
  <Head title="Confirm Password" />

  <div class="container">
    <div class="columns is-mobile is-centered">
      <div
        class="column is-three-quarters-mobile is-half-tablet is-half-desktop"
      >
        <section
          class="
            section
            is-medium
            has-text-left
            whitesmoke-section
            box
            login-box
            px-8
            py-6
          "
          v-show="!$page.props.flash.success"
        >
          <div class="mb-4 is-size-7 has-text-grey">
            You are heading into some dangerous off-roading areas! Please
            confirm your password before continuing.
          </div>

          <form
            @submit.prevent="confirmPassword()"
            :disabled="formFields.processing"
          >
            <PasswordInput v-model:password="formFields.password" />

            <div class="field">
              <div class="control">
                <button
                  class="button button-filled is-rounded login-submit mt-4"
                  v-show="!loadingSpinner"
                  :disabled="formFields.password === ''"
                >
                  Confirm
                </button>

                <button
                  v-show="loadingSpinner"
                  class="button button-filled is-rounded is-loading mt-4"
                ></button>
              </div>
            </div>
          </form>

          <Errors :errors="$page.props.errors" />
        </section>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import Layout from '../../Shared/Layout';
import Errors from '../../components/Errors';
import PasswordInput from '../../components/PasswordInput';
import { ref } from 'vue';

export default {
  layout: Layout,
  components: { Errors, PasswordInput },
  props: {
    errors: Object,
    csrf_token: String,
  },
  setup(props) {
    let loadingSpinner = ref(false);

    const formFields = useForm({ password: '' });

    function confirmPassword() {
      loadingSpinner.value = true;

      formFields.post('/confirm-password', {
        _token: props.csrf_token,
        preserveScroll: true,
        onSuccess: () => {
          formFields.reset();

          loadingSpinner.value = false;
        },
        onError: () => {
          loadingSpinner.value = false;
        },
      });
    }

    return {
      formFields,
      loadingSpinner,
      confirmPassword,
    };
  },
};
</script>
