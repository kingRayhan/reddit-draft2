<template>
  <section class="navbar bg-primary mb-5">
    <nav class="navbar__inner container mx-auto flex items-end justify-between">
      <nuxt-link class="navbar__logo" to="/"></nuxt-link>

      <div class="navbar__user-menu bg-primaryLight" v-if="isloggedIn">
        Howdy
        <a class="font-bold" href="#"> /r/rayhan </a>
        <a class="text-xs text-gray-700" href="#">
          (settings)
        </a>
        <span class="font-thin">|</span>
        <a href="#" to="/notifications"> Notifications (14) </a>
        <span class="font-thin">|</span>
        <a href="#" class="cursor-pointer">Logout</a>
      </div>

      <div class="navbar__user-menu bg-primaryLight" v-else>
        Want to join?
        <button class="link">Login</button>
        or
        <button class="link">Signup</button>
        in a seconds.
      </div>
    </nav>
  </section>
</template>

<script>
export default {
  data() {
    return {
      isloggedIn: true
    };
  }
};
</script>
