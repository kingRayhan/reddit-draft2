<template>
  <form @submit.prevent="handleLogin" class="">
    <ul>
      <li class="text-red-500 " v-for="error in errors" :key="error">
        {{ error.join("") }}
      </li>
    </ul>

    <div
      class="flex flex-col items-end p-2 mb-3 border border-gray-600 justify-items-end"
    >
      <div class="flex">
        <input
          type="text"
          placeholder="Email"
          class="w-1/2 px-3 py-1 mr-3 border border-gray-600 focus:outline-none focus:border-primaryDark"
          v-model="form.email"
        />
        <input
          type="password"
          placeholder="Email"
          class="w-1/2 px-3 py-1 border border-gray-600 focus:outline-none focus:border-primaryDark"
          v-model="form.password"
        />
      </div>
      <div>
        <a href="#">Forgot password?</a>
        <button class="px-3 mt-2 bg-gray-200 border border-gray-600 ">
          Login
        </button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      errors: {}
    };
  },
  methods: {
    handleLogin() {
      this.$auth
        .loginWith("local", { data: this.form })
        .then(res =>
          this.$store.commit("alert/SUCCESS_ALERT", res.data.message)
        )
        .catch(e => {
          this.errors = e.response.data.errors;
          this.$store.commit("alert/ERROR_ALERT", e.response.data.message);
        });
    }
  }
};
</script>
