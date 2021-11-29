<template>
  <div class="p-10 flex">
    <p>
      {{ task.title }}
    </p>
    <button
      v-if="task.status == '0'"
      @click.prevent="toggleCompleteTask(task)"
      class="
        bg-green-500
        hover:bg-green-700
        text-white
        font-bold
        py-1
        px-2
        rounded
        mx-2
      "
    >
      Mark Complete
    </button>
    <button
      v-else
      @click.prevent="toggleCompleteTask(task)"
      class="
        bg-green-500
        hover:bg-green-700
        text-white
        font-bold
        py-1
        px-2
        rounded
        mx-2
      "
    >
      Mark Uncomplete
    </button>
    <button
      class="
        bg-blue-500
        hover:bg-blue-700
        text-white
        font-bold
        py-1
        px-2
        rounded
      "
      @click.prevent="editT(task)"
    >
      Edit
    </button>
    <button
      class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
      @click.prevent="deleteT(task.id)"
    >
      Delete
    </button>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  props: {
    task: {
      required: true,
    },
  },
  methods: {
    ...mapActions({
      deleteTask: "tasks/delete",
      toggleComplete: "tasks/toggleComplete",
    }),
    toggleCompleteTask(task) {
      this.toggleComplete(task);
    },
    deleteT(id) {
      this.deleteTask(id);
    },
    editT(task) {
      this.$emit("onEdit", task);
    },
  },
};
</script>
