<template>
  <Head title="Contact Us" />

  <div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
      <section class="section whitesmoke-section">
        <h2 class="title is-2">Contact Us</h2>

        <form
          class="form"
          @submit.prevent="submitContactUsForm()"
          :disabled="formFields.processing"
        >
          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field required">
                <label class="label">
                  First Name
                  <span v-if="!formFields.first_name" class="red-asterisks"
                    >*</span
                  >
                </label>

                <div class="control">
                  <input
                    v-model="formFields.first_name"
                    class="input"
                    type="text"
                    name="first_name"
                  />

                  <small
                    v-if="formFields.hasErrors && $page.props.errors.first_name"
                    class="errors-text"
                    v-text="$page.props.errors.first_name"
                  ></small>
                </div>
              </div>

              <div class="field">
                <label class="label">Last Name</label>

                <div class="control">
                  <input
                    v-model="formFields.last_name"
                    class="input"
                    type="text"
                    name="last_name"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="field required">
            <label class="label">
              Email
              <span v-if="!formFields.email" class="red-asterisks">*</span>
            </label>

            <div class="control has-icons-left has-icons-right">
              <input
                v-model="formFields.email"
                :class="{
                  input: true,
                  'red-email-text': !validEmail,
                }"
                type="email"
                name="email"
              />

              <small
                v-if="formFields.hasErrors && $page.props.errors.email"
                class="errors-text"
              >
                {{ $page.props.errors.email }}
              </small>

              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
          </div>

          <div class="field required">
            <label class="label">
              Message
              <span v-if="!formFields.message" class="red-asterisks">*</span>
            </label>
            <div class="control">
              <textarea
                v-model="formFields.message"
                class="textarea"
                placeholder="Type your message here"
                name="message"
              ></textarea>

              <small
                v-if="formFields.hasErrors && $page.props.errors.message"
                class="errors-text"
              >
                {{ $page.props.errors.message }}
              </small>
            </div>
          </div>

          <div v-show="!loadingSpinner" class="field is-grouped">
            <div class="control">
              <button
                :disabled="submitButtonIsDisabled()"
                class="button button-filled is-rounded"
              >
                Submit
              </button>
            </div>

            <div class="control">
              <button
                v-on:click="clearTextFormFieldsAndErrors()"
                type="button"
                class="button is-text clear-button"
              >
                Clear
              </button>
            </div>
          </div>

          <button
            v-show="loadingSpinner"
            class="button button-filled is-rounded is-loading"
          ></button>
        </form>
      </section>
    </div>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';
import { ref, computed } from 'vue';

export default {
  layout: Layout,
  props: {
    errors: Object,
  },
  setup(props) {
    const formFields = useForm({
      first_name: '',
      last_name: '',
      email: '',
      message: '',
    });

    let loadingSpinner = ref(false);

    let validEmail = computed(() => {
      return formFields.email.includes('@');
    });

    function submitContactUsForm() {
      loadingSpinner.value = true;

      formFields.post('/contact', {
        preserveScroll: true,
        onSuccess: () => {
          formFields.reset();

          loadingSpinner.value = false;
        },
        onError: () => {
          loadingSpinner.value = false;

          if (formFields.hasErrors) {
            if (formFields.errors.first_name) {
              formFields.first_name = '';
            }

            if (formFields.errors.last_name) {
              formFields.last_name = '';
            }

            if (formFields.errors.message) {
              formFields.message = '';
            }
          }
        },
      });
    }

    function clearTextFormFieldsAndErrors() {
      formFields.reset();
    }

    function submitButtonIsDisabled() {
      return (
        formFields.first_name === '' ||
        formFields.email === '' ||
        formFields.message === ''
      );
    }

    return {
      formFields,
      validEmail,
      loadingSpinner,
      submitContactUsForm,
      clearTextFormFieldsAndErrors,
      submitButtonIsDisabled,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '@/_variables.scss';

button.clear-button {
  color: $main-site-color;
  text-decoration: none;
}

button.clear-button {
  color: $secondary-site-color;
}

.red-email-text {
  color: #f00;
}
</style>