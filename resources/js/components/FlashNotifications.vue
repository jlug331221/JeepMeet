<template>
  <div
    class="columns is-mobile is-centered mt-4"
    v-show="success || error || status"
  >
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
      <div v-show="success" class="notification is-success is-light">
        <button v-on:click="hideNotification()" class="delete"></button>
        {{ success }}
      </div>

      <div v-show="status" class="notification is-info is-light">
        <button v-on:click="hideNotification()" class="delete"></button>
        {{ status }}
      </div>

      <div v-show="error" class="notification is-danger">
        <button v-on:click="hideNotification()" class="delete"></button>
        {{ error }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    success: {
      String,
      default: '',
    },
    error: {
      String,
      default: '',
    },
    status: {
      String,
      default: '',
    },
  },
  emits: ['hide'],
  setup(_, { emit }) {
    function hideNotification() {
      emit('hide', '');
    }

    return {
      hideNotification,
    };
  },
};
</script>