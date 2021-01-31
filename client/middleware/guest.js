export default function({ app, redirect, store }) {
  if (app.$auth.loggedIn) {
    store.commit("alert/ERROR_ALERT", "You are already logged in");
    redirect("/");
  }
}
