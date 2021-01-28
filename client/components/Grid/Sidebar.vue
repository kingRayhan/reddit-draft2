<template>
  <div>
    <div>
      <nuxt-link class="submitter-button mb-4" to="/new">
        <span>Submit now</span>
        <div class="nub"></div>
      </nuxt-link>
    </div>

    <img
      src="~/static/images/toto-logo-1599689481-30467661479.png"
      alt="reddit"
      class="my-4"
    />

    <Rules />
  </div>
</template>

<script>
export default {
  data() {
    return {
      mode: "login"
    };
  }
};
</script>
