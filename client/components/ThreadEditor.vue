<template>
  <div>
    <h2 class="mb-4 text-2xl">Submit post/link</h2>

    <div class="w-8/12 ">
      <form @submit.prevent="handleSaveThread">
        <tabs :options="{ useUrlFragment: false }" @changed="tabChanged">
          <div class="input-wrapper">
            <Input
              label="Title"
              v-model="form.title"
              :helperText="errors.title && errors.title.join('')"
              :isError="errors.title !== undefined"
            />
          </div>

          <tab name="Link">
            <div class="mb-4 input-wrapper">
              <Input
                label="Url"
                v-model="form.link"
                :helperText="errors.link && errors.link.join('')"
                :isError="errors.link !== undefined"
              />
            </div>
          </tab>
          <tab name="Text">
            <div class="input-wrapper">
              <Textarea
                label="Text (Optional)"
                v-model="form.body"
                :helperText="errors.body && errors.body.join('')"
                :isError="errors.body !== undefined"
              />
            </div>
          </tab>
        </tabs>

        <!-- Image -->
        <div class="input-wrapper">
          <Dropzone
            id="Dropzone"
            :options="{
              url: 'https://api.cloudinary.com/v1_1/firereddit/image/upload',
              paramName: 'file',
              params: { upload_preset: 'fire-reddit-assets' },
              dictDefaultMessage: `UPLOAD ME`,
              uploadMultiple: false,
              parallelUploads: 1
            }"
            @vdropzone-success="handleThumbnail"
          />
        </div>

        <div class="mt-4">
          <Button>Submit</Button>
        </div>
      </form>
    </div>

    <div class="mt-4">
      <div>
        please be mindful of reddit's
        <a href="https://old.reddit.com/help/contentpolicy" target="_blank"
          >content policy</a
        >
        and practice
        <a href="https://old.reddit.com/wiki/reddiquette" target="_blank">
          good reddiquette </a
        >.
      </div>
      <div class="link-notice" style="display: none">
        posting this link saves the image or gif to reddit.
      </div>
    </div>
  </div>
</template>

<script>
import Dropzone from "nuxt-dropzone";
import "nuxt-dropzone/dropzone.css";
export default {
  middleware: "auth",
  name: "New",
  head: {
    title: "Submit post/link"
  },
  components: {
    Dropzone
  },
  data() {
    return {
      form: {
        title: "",
        body: "",
        link: ""
      },
      type: "LINK",
      errors: {}
    };
  },
  methods: {
    handleThumbnail(_, response) {
      this.form.thumbnail = response.secure_url;
    },
    tabChanged({ tab }) {
      if (tab.name) this.type = tab.name.toUpperCase();
    },
    async handleSaveThread() {
      try {
        if (this.type === "LINK") {
          await this.$axios.$post("/api/threads/link", this.form);
        }
        if (this.type === "TEXT") {
          console.log("text");
          await this.$axios.$post("/api/threads/text", this.form);
        }
        this.$router.push({ name: "index" });
      } catch (e) {
        this.$store.commit("alert/ERROR_ALERT", e.response.data.message);
        this.errors = e.response.data.errors;
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.input-component {
  padding: 12px 12px;
  border-radius: 8px;
  @apply bg-primary;
}
</style>
