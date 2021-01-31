<template>
  <div
    v-if="message"
    class="relative py-3 text-center text-white"
    :class="{
      'bg-red-600': type === 'error',
      'bg-green-600': type === 'success'
    }"
  >
    <p>{{ message }}</p>

    <button
      @click="$store.commit('alert/CLEAR')"
      class="absolute top-0 right-0 mt-1 mr-2 text-2xl"
    >
      &times;
    </button>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState("alert", ["message", "type"])
  }
};
</script>
