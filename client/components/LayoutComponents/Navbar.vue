<template>
  <div>
    <Alert />
    <nav class="navbar">
      <div class="container navbar__inner">
        <nuxt-link class="navbar__logo" to="/"></nuxt-link>

        <div class="navbar__user-menu" v-if="$auth.loggedIn">
          Howdy
          <a class="font-bold" href="#"> /r/{{ $auth.user.username }} </a>
          <nuxt-link class="text-xs text-gray-700" to="/auth/settings">
            (settings)
          </nuxt-link>
          <span class="font-thin">|</span>
          <a href="#" to="/notifications"> Notifications (14) </a>
          <span class="font-thin">|</span>
          <a href="#" class="cursor-pointer" @click="$auth.logout()">Logout</a>
        </div>

        <div class="navbar__user-menu" v-if="!$auth.loggedIn">
          Want to join?
          <nuxt-link to="/login">Login</nuxt-link>
          or
          <nuxt-link to="/auth/register" class="link">Signup</nuxt-link>
          in a seconds.
        </div>
      </div>
    </nav>
  </div>
</template>
