<template>
  <div>
    <TasksList :completed="true" />
  </div>
</template>

<script>
import TasksList from "~/components/TasksList";

export default {
  components: { TasksList },
};
</script>
