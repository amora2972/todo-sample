<template>
  <Modal title="Create Task" @onClose="onModalClose" @onSave="addTask">
    <input type="text" />
  </Modal>
</template>

<script>
import Modal from "~/components/Modal";

export default {
  components: { Modal },
  methods: {
    onModalClose() {
      console.log("on close");
    },
    addTask() {
      console.log("add task");
    },
  },
};
</script>
