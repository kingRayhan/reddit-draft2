<template>
  <div>
    <h3 class="mb-4 font-bold uppercase text-primaryDark">
      create a new account
    </h3>

    <form @submit.prevent="handleRegister">
      <Input
        label="User Name"
        placeholder="Your username"
        v-model="form.username"
        :helperText="errors.username && errors.username.join('')"
        :isError="errors.username !== undefined"
      />

      <Input
        type="email"
        label="Email address"
        placeholder="Your email address"
        v-model="form.email"
        :helperText="errors.email && errors.email.join('')"
        :isError="errors.email !== undefined"
      />

      <Input
        type="password"
        label="Password"
        placeholder="Password"
        v-model="form.password"
        :helperText="errors.password && errors.password.join('')"
        :isError="errors.password !== undefined"
      />

      <Input
        type="password"
        label="Confirm password"
        placeholder="Confirm password"
        v-model="form.password_confirmation"
        :helperText="
          errors.password_confirmation && errors.password_confirmation.join('')
        "
        :isError="errors.password_confirmation !== undefined"
      />

      <Button>Register</Button>
    </form>
  </div>
</template>

<script>
export default {
  head: {
    title: "Register"
  },
  // middleware: "guest",
  data: () => ({
    form: {
      username: "",
      email: "",
      password: "",
      password_confirmation: ""
    },
    errors: {}
  }),
  methods: {
    handleRegister() {
      this.$axios
        .$post("/api/auth/register", this.form)
        .then(res => {
          this.$router.push("/");
          this.$store.commit(
            "alert/SUCCESS_ALERT",
            "Successfully resgistered!"
          );
        })
        .catch(e => {
          this.$store.commit("alert/ERROR_ALERT", e.response.data.message);
          this.errors = e.response.data.errors;
        });
    }
  }
};
</script>
