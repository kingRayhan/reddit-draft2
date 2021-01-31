<template>
  <div>
    <WelcomeBanner />
    <Thread
      v-for="thread in threads"
      :key="thread.id"
      :thread="thread"
      class="mb-3"
    />
    <div
      v-observe-visibility="visibilityChanged"
      v-if="this.lastPage != this.currentPage"
    >
      <Loader />
    </div>
  </div>
</template>
<script>
import Button from "~/components/Form/Button.vue";
export default {
  components: { Button },
  head: {
    title: "Home"
  },
  data: () => ({
    newTask: "",
    threads: [],
    currentPage: 1,
    lastPage: null
  }),
  async asyncData({ app }) {
    const { data: threads, meta } = await app.$axios.$get("/api/threads");
    return {
      threads,
      currentPage: meta.current_page,
      lastPage: meta.last_page
    };
  },
  methods: {
    async loadMore() {
      const { data: threads, meta } = await this.$axios.$get(
        `/api/threads?page=${this.currentPage}`
      );
      this.threads.push(...threads);
      this.currentPage = meta.current_page;
    },
    visibilityChanged(isVisible) {
      if (!isVisible) return;
      if (this.currentPage >= this.lastPage) return;

      this.currentPage++;
      this.loadMore();
    }
  }
};
</script>
