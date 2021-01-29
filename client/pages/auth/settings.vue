<template>
  <div>
    <h2 class="text-3xl uppercase text-primaryDark">Settings</h2>
    <form @submit.prevent="handleUpdateProfile">
      <Input
        name="username"
        placeholder="Username"
        label="Username"
        v-model="profile.username"
        :helperText="errors.username && errors.username.join('')"
        :isError="errors.username !== undefined"
      />
      <Input
        name="email"
        placeholder="Email"
        label="Email"
        v-model="profile.email"
        :helperText="errors.email && errors.email.join('')"
        :isError="errors.email !== undefined"
      />
      <Button>Update Profile</Button>
    </form>
    <form class="mt-5" @submit.prevent="handleUpdatePassword">
      <Input
        name="current_password"
        placeholder="Current password"
        label="Current password"
        type="password"
        v-model="password.current_password"
        :helperText="
          errors.current_password && errors.current_password.join('')
        "
        :isError="errors.current_password !== undefined"
      />
      <Input
        name="password"
        placeholder="Password"
        label="New password"
        type="password"
        v-model="password.password"
        :helperText="errors.password && errors.password.join('')"
        :isError="errors.password !== undefined"
      />
      <Input
        name="password_confirmation"
        placeholder="Confirm new password"
        label="Confirm password"
        type="password"
        v-model="password.password_confirmation"
        :helperText="
          errors.password_confirmation && errors.password_confirmation.join('')
        "
        :isError="errors.password_confirmation !== undefined"
      />
      <Button>Update password</Button>
    </form>
    <form @submit.prevent="handleDestroyProfile" class="mt-8">
      <div class="p-5 border-2 border-red-500 border-dashed">
        <div class="mb-3">
          <h3 class="text-2xl font-bold text-red-500 uppercase">Danger zone</h3>
          <p class="text-xl text-gray-600">
            Be careful. Once you delete your profile, it can not be undone. All
            post/link/comment your created will deleted autometically.
          </p>
        </div>

        <Input
          name="password"
          placeholder="Current password"
          label="Confirm password"
          type="password"
        />

        <button class="px-2 py-1 text-white bg-red-500 rounded">
          Delete profile
        </button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  middleware: "auth",
  head: {
    title: "Profie Settings"
  },
  data() {
    return {
      profile: {
        ...this.$auth.user
      },
      password: {
        current_password: "",
        password: "",
        password_confirmation: ""
      },
      errors: {}
    };
  },
  methods: {
    handleUpdateProfile() {
      this.$axios
        .$post("/api/auth/update-profile", this.profile)
        .then(async res => {
          this.$store.commit("error/SUCCESS", res.message);
          await this.$auth.fetchUser();
          this.errors = {};
          setTimeout(() => {
            this.$store.commit("error/CLEAR");
          }, 5000);
        })
        .catch(e => {
          this.errors = e.response.data.errors;
          this.$store.commit("error/ERROR", e.response.data.message);

          setTimeout(() => {
            this.$store.commit("error/CLEAR");
          }, 5000);
        });
    },
    handleUpdatePassword() {
      this.$axios
        .$post("/api/auth/update-password", this.password)
        .then(async res => {
          this.$store.commit("error/SUCCESS", res.message);
          this.errors = {};
          this.password = {};
          setTimeout(() => {
            this.$store.commit("error/CLEAR");
          }, 5000);
        })
        .catch(e => {
          this.errors = e.response.data.errors;
          this.$store.commit("error/ERROR", e.response.data.message);

          setTimeout(() => {
            this.$store.commit("error/CLEAR");
          }, 5000);
        });
    },
    handleDestroyProfile() {}
  }
};
</script>
