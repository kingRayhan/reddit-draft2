<template>
  <div class="mb-2 input-component">
    <label>
      <span class="font-bold text-gray-600" v-if="label">
        {{ label }}
      </span>
      <input
        :value="value"
        :placeholder="placeholder"
        :type="type"
        @input="$emit('input', $event.target.value)"
        class="block w-full px-2 py-1 text-xl border focus:outline-none"
        :class="{ 'border-red-600': isError }"
      />
      <p
        class="text-sm text-gray-600 "
        :class="{
          'text-red-600': isError
        }"
        v-if="helperText"
      >
        {{ helperText }}
      </p>
    </label>
  </div>
</template>
<script>
export default {
  props: {
    label: {
      type: String,
      required: false
    },
    placeholder: {
      type: String,
      required: false
    },
    value: {
      type: String,
      required: false
    },
    type: {
      type: String,
      required: false,
      default: "text"
    },
    helperText: {
      type: String,
      required: false
    },
    isError: {
      type: Boolean,
      required: false,
      default: false
    }
  }
};
</script>
