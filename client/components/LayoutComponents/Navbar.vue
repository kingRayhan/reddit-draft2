<template>
  <nav class="navbar">
    <Alert />
    <div class="container navbar__inner">
      <nuxt-link class="navbar__logo" to="/"></nuxt-link>

      <div class="navbar__user-menu" v-if="$auth.loggedIn">
        Howdy
        <a class="font-bold" href="#"> /r/{{ $auth.user.username }} </a>
        <a class="text-xs text-gray-700" href="#">
          (settings)
        </a>
        <span class="font-thin">|</span>
        <a href="#" to="/notifications"> Notifications (14) </a>
        <span class="font-thin">|</span>
        <a href="#" class="cursor-pointer" @click="$auth.logout()">Logout</a>
      </div>

      <div class="navbar__user-menu" v-else>
        Want to join?
        <button class="link">Login</button>
        or
        <button class="link">Signup</button>
        in a seconds.
      </div>
    </div>
  </nav>
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
