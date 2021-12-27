<template>
  <h1 class="title has-text-centered mt-4">You are logged in and verified!!</h1>
</template>

<script>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';

export default {
  layout: Layout,
  setup() {
    const user = computed(() => usePage().props.value.auth.user);

    return { user };
  },
};
</script>