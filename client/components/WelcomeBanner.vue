<template>
  <section>
    <h2 class="text-2xl">Welcome to Reddit.</h2>

    <h4 class="mb-2 text-xl">
      Where a community about your favorite things is waiting for you.
    </h4>

    <Button @click="$router.push('/auth/register')">
      Button Become a Redditor
    </Button>
  </section>
</template>

<style scoped>
section {
  background-image: url("~static/images/welcome-banner.png");
  background-position: right;
  background-color: #fefbca;
  padding: 8px;
}
</style>
