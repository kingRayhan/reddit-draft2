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
