<template>
  <Head title="Reset Password" />

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
        >
          <h2 class="title is-2">Reset Password</h2>

          <form
            @submit.prevent="resetPassword()"
            :disabled="formFields.processing"
          >
            <o-field>
              <o-input
                placeholder="Email"
                iconPack="fas"
                icon="envelope"
                v-model="formFields.email"
                name="email"
                type="email"
                :variant="{ danger: true }"
                required
              ></o-input>
            </o-field>

            <PasswordInput v-model:password="formFields.password" />

            <PasswordInput
              v-model:password="formFields.password_confirmation"
              placeholder="Confirm Password"
            />

            <div class="field">
              <div class="control">
                <button
                  class="button button-filled is-rounded login-submit mt-4"
                  v-show="!loadingSpinner"
                  :disabled="submitButtonDisabled()"
                >
                  Submit
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
    token: String, // Token created for resetting password (not csrf token)
  },
  setup(props) {
    let loadingSpinner = ref(false);

    const formFields = useForm({
      email: '',
      password: '',
      password_confirmation: '',
      token: props.token,
    });

    function resetPassword() {
      loadingSpinner.value = true;

      formFields.post(route('password.update'), {
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

    function submitButtonDisabled() {
      return (
        formFields.email === '' ||
        formFields.password === '' ||
        formFields.password_confirmation === '' ||
        passwordsNotEqual()
      );
    }

    function passwordsNotEqual() {
      return formFields.password !== formFields.password_confirmation;
    }

    return {
      formFields,
      loadingSpinner,
      passwordsNotEqual,
      resetPassword,
      submitButtonDisabled,
    };
  },
};
</script>
