<template>
  <div v-bind="$attrs">
    <div class="thread">
      <div class="thread__votes">
        <button
          class="arrow arrow--up-vote"
          :class="{ 'arrow--up-vote--voted': true }"
        ></button>

        <div class="text-sm font-bold text-gray-600">14</div>

        <button
          class="arrow arrow--down-vote"
          :class="{
            'arrow--down-vote--voted': false
          }"
        ></button>
      </div>

      <div class="thread__inner">
        <div class="thread__icon">
          <a
            href="#"
            class="block logos"
            :class="{
              'logos--logo-link': thread.type === 'LINK',
              'logos--logo-post': thread.type === 'TEXT'
            }"
          ></a>
        </div>

        <div>
          <nuxt-link
            :to="{ name: 'slug', params: { slug: thread.slug } }"
            class="mt-0 text-xl"
          >
            {{ thread.title }}
          </nuxt-link>
          <a
            :href="thread.link"
            target="_blank"
            class="text-sm text-gray-500"
            v-if="thread.type === 'LINK'"
          >
            ({{ $parseUrl(thread.link).hostname }})
          </a>

          <div class="flex">
            <button
              class="mr-2 icons icons--icon-post"
              :class="{ 'icons--icon-post--active': expanded }"
              @click="expanded = !expanded"
              v-if="thread.thumbnail"
            ></button>

            <div>
              <p class="text-sm text-gray-600">
                submitted {{ thread.created_at }} by
                <a href="#" class="font-bold text-gray-600">
                  u/{{ thread.user.username }}
                </a>
              </p>

              <div>
                <span class="mr-3 text-sm font-bold text-gray-600">
                  74 comments
                </span>
                <button
                  class="mr-3 text-sm font-bold text-gray-600 hover:underline"
                >
                  Share
                </button>
                <a class="text-sm font-bold text-red-600 cursor-pointer">
                  Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="expanded && thread.thumbnail">
      <img :src="thread.thumbnail" :alt="thread.title" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    thread: {
      type: Object,
      required: true
    },
    expanded: {
      type: Boolean,
      default: false
    }
  }
};
</script>
