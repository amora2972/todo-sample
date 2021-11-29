<template>
  <div class="p-10 flex flex-col">
    <h1>Tasks</h1>
    <Task v-for="task in tasks" :key="task.id" :task="task" @onEdit="editT" />

    <Modal
      v-if="showOnEditModal"
      @onClose="closeEditModal"
      @onSave="updateTask"
    >
      <task-create-edit-form :task="taskInEdit" />
    </Modal>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import Task from "~/components/Task";
import TaskCreateEditForm from "./TaskCreateEditForm.vue";

export default {
  name: "TasksList",
  props: {
    completed: {
      required: false,
      default: false,
    },
  },
  components: { Task, TaskCreateEditForm },
  data() {
    return {
      taskInEdit: {},
      showOnEditModal: false,
    };
  },
  mounted() {
    this.fetchList();
  },
  methods: {
    ...mapActions({
      fetchList: "tasks/fetchList",
    }),
    editT(task) {
      this.taskInEdit = { ...task };
      this.showOnEditModal = true;
    },
    closeEditModal() {
      this.showOnEditModal = false;
    },
    updateTask() {
      this.$store.dispatch("tasks/update", this.taskInEdit);
    },
  },
  computed: {
    ...mapGetters({
      allTasks: "tasks/list",
      completedTasks: "tasks/completed",
    }),
    tasks() {
      if (this.completed) {
        return this.completedTasks;
      }
      return this.allTasks;
    },
  },
};
</script>
