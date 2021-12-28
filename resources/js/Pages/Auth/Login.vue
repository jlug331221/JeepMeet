<template>
  <Head title="Login" />

  <div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
      <!-- @error('username')
      <div
        class="
          mt-4
          login-error-notification
          is-danger is-light
        "
      >
        <button class="delete handle-delete-of-button"></button>
        {{ $message }}
      </div>
      @enderror -->

      <section
        class="section is-medium has-text-left whitesmoke-section login-box box"
      >
        <h2 class="title is-2">Login</h2>

        <form @submit.prevent="login()" :disabled="formFields.processing">
          <div class="field">
            <div class="control has-icons-left">
              <input
                v-model="formFields.username"
                type="text"
                id="username-input"
                class="input"
                placeholder="Username"
                name="username"
                required
              />

              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <div class="control has-icons-left">
              <input
                v-model="formFields.password"
                type="password"
                id="password-input"
                class="input"
                placeholder="Password"
                name="password"
                required
              />

              <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <label class="checkbox login-checkbox">
                <input
                  v-model="formFields.remember"
                  type="checkbox"
                  name="remember"
                />
                Keep Me Logged In
              </label>
            </div>
          </div>

          <div class="field">
            <Link class="has-text-left" :href="route('password.request')"
              >Forgot Credentials</Link
            >
          </div>

          <div class="field">
            <div class="control">
              <button
                class="button button-filled is-rounded login-submit"
                v-show="!loadingSpinner"
                v-on:click="login()"
                :disabled="
                  formFields.username === '' || formFields.password === ''
                "
              >
                Submit
              </button>

              <button
                v-show="loadingSpinner"
                class="button button-filled is-rounded is-loading"
              ></button>
            </div>
          </div>

          <div v-show="formFields.hasErrors" class="mt-4">
            <ul>
              <li
                class="errors-text"
                v-for="error in $page.props.errors"
                :key="error"
              >
                {{ error }}
              </li>
            </ul>
          </div>
        </form>
      </section>
    </div>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import Layout from '../../Shared/Layout';
import { ref } from 'vue';

export default {
  layout: Layout,
  props: {
    errors: Object,
  },
  setup(props) {
    let loadingSpinner = ref(false);

    const formFields = useForm({
      username: '',
      password: '',
      remember: false,
    });

    function login() {
      loadingSpinner.value = true;

      formFields.post('/login', {
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
      login,
    };
  },
};
</script>

<style lang="scss">
@import '@/_variables.scss';

.login-box a,
.checkbox.login-checkbox {
  font-size: 0.7rem;
  text-align: left;

  @media only screen and (min-width: 768px) {
    font-size: 0.75rem;
  }

  @media only screen and (min-width: 1088px) {
    font-size: 0.8rem;
  }
}

.box {
  border-radius: 2px;
}
</style>