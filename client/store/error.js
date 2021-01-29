export const state = () => ({
  message: "",
  type: "" // success, error
});

export const mutations = {
  CLEAR(state) {
    state.message = "";
    state.type = "";
  },
  ERROR(state, message) {
    state.type = "error";
    state.message = message;
  },
  SUCCESS(state, message) {
    state.type = "success";
    state.message = message;
  }
};
