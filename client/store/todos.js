export const state = () => ({
  filter: "all",
  todos: [
    { id: 1, task: "task 1", done: false },
    { id: 2, task: "task 2", done: true },
    { id: 3, task: "task 3", done: false },
    { id: 4, task: "task 1", done: true }
  ]
});

export const mutations = {
  ADD_TODO(state, task) {
    state.todos.unshift({
      id: Date.now(),
      task,
      done: false
    });
  },
  REMOVE_TODO(state, todoId) {
    const index = state.todos.findIndex(t => t.id === todoId);
    state.todos.splice(index, 1);
  },
  TOGGLE_DONE(state, todoId) {
    const index = state.todos.findIndex(t => t.id === todoId);
    state.todos[index].done = !state.todos[index].done;
  },
  FILTER(state, payload) {
    state.filter = payload;
  }
};

export const getters = {
  todoCount(state) {
    return {
      done: state.todos?.filter(t => t.done).length,
      undone: state.todos?.filter(t => !t.done).length
    };
  },
  filteredTodos(state) {
    if (state.filter === "all") return state.todos;
    if (state.filter === "done") return state.todos.filter(t => t.done);
    if (state.filter === "undone") return state.todos.filter(t => !t.done);
  }
};

export const actions = {
  addTodo({ state }, task) {
    setTimeout(() => {
      state.todos.unshift({
        id: Date.now(),
        task,
        done: false
      });
    }, 3000);
  }
};
