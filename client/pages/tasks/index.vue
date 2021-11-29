<template>
  <div>
    <button @click.prevent="modalOpened = true">Add New Task</button>
    <TasksList />
    <Modal
      title="Create Task"
      @onClose="onModalClose"
      @onSave="addTask"
      v-if="modalOpened"
    >
      <task-create-edit-form :task="task" />
    </Modal>
  </div>
</template>

<script>
import TasksList from "~/components/TasksList";
import Modal from "~/components/Modal";
import TaskCreateEditForm from "~/components/TaskCreateEditForm";

export default {
  data() {
    return {
      modalOpened: false,
      task: {},
    };
  },
  components: { TasksList, TaskCreateEditForm, Modal },
  methods: {
    onModalClose() {
      this.modalOpened = false;
    },
    async addTask() {
      this.$store.dispatch("tasks/add", this.task);
      this.modalOpened = false;
    },
  },
};
</script>
