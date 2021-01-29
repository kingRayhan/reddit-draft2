<template>
  <div
    v-if="$store.state.error.message"
    class="absolute top-0 left-0 w-full py-3 text-center text-white"
    :class="{
      ' bg-red-600': $store.state.error.type === 'error',
      ' bg-green-600': $store.state.error.type === 'success'
    }"
  >
    <p>
      {{ $store.state.error.message }}
    </p>

    <button
      @click="$store.commit('error/CLEAR')"
      class="absolute top-0 right-0 mt-2 mr-2 text-xl"
    >
      &times;
    </button>
  </div>
</template>
