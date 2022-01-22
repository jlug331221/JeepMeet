<template>
  <div class="field">
    <div class="control has-icons-left has-icons-right">
      <input
        :value="password"
        @input="$emit('update:password', $event.target.value)"
        :type="togglePassword"
        class="input"
        :placeholder="placeholder"
        name="password"
        autocomplete="off"
        required
      />

      <span class="icon is-small is-left">
        <i class="fas fa-lock"></i>
      </span>

      <span
        class="icon is-small is-right"
        style="pointer-events: all; cursor: pointer"
        @click="togglePasswordVisibility"
        v-show="togglePassword === 'password'"
      >
        <i class="fas fa-eye"></i>
      </span>

      <span
        class="icon is-small is-right"
        style="pointer-events: all; cursor: pointer"
        @click="togglePasswordVisibility"
        v-show="togglePassword === 'text'"
      >
        <i class="fas fa-eye-slash"></i>
      </span>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  props: {
    password: String,
    placeholder: {
      String,
      default: 'Password',
    },
  },
  emits: ['update:password'],
  setup() {
    let togglePassword = ref('password');

    function togglePasswordVisibility() {
      if (togglePassword.value === 'text') {
        togglePassword.value = 'password';

        return;
      }

      if (togglePassword.value === 'password') {
        togglePassword.value = 'text';

        return;
      }
    }

    return {
      togglePasswordVisibility,
      togglePassword,
    };
  },
};
</script>