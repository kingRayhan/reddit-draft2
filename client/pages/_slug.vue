<template>
  <div>
    <Thread :thread="thread" :expanded="true" />
    <hr class="my-5" />

    <div
      class="p-2 my-4 text-2xl border border-dashed rounded"
      v-if="thread.body"
    >
      {{ thread.body }}
    </div>
  </div>
</template>
<script>
export default {
  head() {
    return {
      title: this.thread.title
    };
  },
  async asyncData({ params, $axios }) {
    const { data: thread } = await $axios.$get(`/api/threads/${params.slug}`);
    return { thread };
  }
};
</script>
