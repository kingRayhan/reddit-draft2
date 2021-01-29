<template>
  <div>
    <WelcomeBanner />

    {{ $auth.loggedIn }}
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  head: {
    title: "Home"
  },
  async mounted() {
    const user = await this.$axios.$get("/api/auth/user");
    console.log(user);
  },
  data() {
    return {
      newTask: ""
    };
  },
  computed: {
    ...mapGetters({
      todos: "todos/filteredTodos"
    })
  }
};
</script>
