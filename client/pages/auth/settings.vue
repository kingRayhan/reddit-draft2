<template>
  <div>
    <h2 class="text-3xl uppercase text-primaryDark">Settings</h2>
    <form @submit.prevent="updateProfile">
      <Input
        placeholder="Username"
        label="Username"
        v-model="profile.username"
        :helperText="errors.username && errors.username.join('')"
        :isError="errors.username !== undefined"
      />
      <Input
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
      />
      <Input
        name="password"
        placeholder="Password"
        label="New password"
        type="password"
      />
      <Input
        name="password_confirmation"
        placeholder="Confirm new password"
        label="Confirm password"
        type="password"
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
    title: "Settings"
  },
  data() {
    return {
      profile: {
        ...this.$auth.user
      },
      errors: {}
    };
  },
  methods: {
    updateProfile() {
      this.$axios
        .$post("/api/auth/update-profile", this.profile)
        .then(res => {
          this.$auth.fetchUser();
          this.$store.commit("alert/SUCCESS_ALERT", res.message);
        })
        .catch(e => {
          this.errors = e.response.data.errors;
          this.$store.commit("alert/ERROR_ALERT", e.response.data.message);
        });
    }
  }
};
</script>
