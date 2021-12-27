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
        class="section is-medium has-text-left whitesmoke-section login-box"
      >
        <h2 class="title is-2">Login</h2>

        <form @submit.prevent="login()">
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
                v-on:click="login()"
              >
                Submit
              </button>
            </div>
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
    const formFields = useForm({
      username: '',
      password: '',
      remember: false,
    });

    function login() {
      formFields.post('/login');
    }

    return {
      formFields,
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
</style>