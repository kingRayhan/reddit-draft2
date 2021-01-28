<template>
  <h1>Postid: {{ $route.params.slug }}</h1>
</template>

<script>
export default {
  head() {
    return {
      title: "Post page"
    };
  }
};
</script>
