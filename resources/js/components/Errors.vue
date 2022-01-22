<template>
  <div v-show="errors" class="mt-5 content is-small">
    <ul>
      <li class="errors-text" v-for="error in errors" :key="error">
        {{ error }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    errors: Object,
  },
  setup() {},
};
</script>