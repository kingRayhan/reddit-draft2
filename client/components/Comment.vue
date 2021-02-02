<template>
  <div class="flex w-full mb-2">
    <!-- voting start -->
    <div class="vote">
      <button
        class="arrow arrow--up-vote"
        :class="{ 'arrow--up-vote--voted': true }"
      ></button>
      <button
        class="arrow arrow--down-vote"
        :class="{ 'arrow--down-vote--voted': false }"
      ></button>
    </div>
    <!-- voting end -->

    <div class="mb-4 ml-5">
      <a class="font-bold" href="#"> u/rayhan </a>
      <span class="text-sm text-gray-600">
        145 point(s) ( 4 minutes ago )
      </span>
      <p class="text-xl">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolor
        pariatur reiciendis facilis placeat architecto temporibus iste et at
        dolorem velit impedit eum similique necessitatibus praesentium,
        reprehenderit quos repellat hic!
      </p>

      <div>
        <a href="#" class="mr-2 text-sm font-bold text-red-600">
          Delete
        </a>

        <a href="#" class="mr-2 text-sm font-bold text-gray-600">
          <span>Reply</span>
        </a>
      </div>

      <div v-if="comment.replies.length" class="mb-2">
        <Comment
          v-for="comment in comment.replies"
          :key="comment.id"
          :comment="comment"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["comment"],
  components: {
    Comment: () => import("./Comment")
  }
};
</script>
