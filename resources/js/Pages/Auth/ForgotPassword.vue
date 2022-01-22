<template>
  <Head title="Forgot Password" />

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
          <div class="mb-4 is-size-7 has-text-grey">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow
            you to choose a new one.
          </div>

          <h2 class="title is-2">Password Reset</h2>

          <form
            @submit.prevent="passwordReset()"
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

            <div class="field">
              <div class="control">
                <button
                  class="button button-filled is-rounded login-submit mt-4"
                  v-show="!loadingSpinner"
                  :disabled="formFields.email === ''"
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
import { ref } from 'vue';

export default {
  layout: Layout,
  components: { Errors },
  props: {
    errors: Object,
    csrf_token: String,
    status: String,
  },
  setup(props) {
    let loadingSpinner = ref(false);

    const formFields = useForm({
      email: '',
    });

    function passwordReset() {
      loadingSpinner.value = true;

      formFields.post('/forgot-password', {
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
      passwordReset,
    };
  },
};
</script>
