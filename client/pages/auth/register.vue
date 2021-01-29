<template>
  <div>
    <h3 class="mb-4 font-bold text-primaryDark">CREATE A NEW ACCOUNT</h3>

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
      this.errors = {};
      this.$axios
        .$post("/api/auth/register", this.form)
        .then(res => {
          this.$router.push({
            name: "index"
          });
        })
        .catch(e => {
          this.errors = e.response.data.errors;
          this.$store.commit("error/ERROR", e.response.data.message);
        });
    }
  }
};
</script>
