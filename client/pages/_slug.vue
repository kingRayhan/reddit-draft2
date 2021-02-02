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

    <Comment v-for="comment in comments" :key="comment.id" :comment="comment" />
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
    const { data: comments } = await $axios.$get(
      `/api/comments?thread_id=${thread.id}`
    );
    return { thread, comments };
  }
};
</script>
