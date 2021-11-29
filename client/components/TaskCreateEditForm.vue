<template>
  <form @submit.prevent="">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Title
      </label>
      <input
        class="
          shadow
          appearance-none
          border
          rounded
          w-full
          py-2
          px-3
          text-gray-700
          leading-tight
          focus:outline-none focus:shadow-outline
        "
        id="title"
        type="text"
        v-model="task.title"
      />
    </div>
    <div class="mb-4">
      <label
        class="block text-gray-700 text-sm font-bold mb-2"
        for="description"
      >
        Description
      </label>
      <textarea
        class="
          shadow
          appearance-none
          border
          rounded
          w-full
          py-2
          px-3
          text-gray-700
          leading-tight
          focus:outline-none focus:shadow-outline
        "
        id="description"
        v-model="task.description"
      ></textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="user">
        User
      </label>
      <select
        class="
          shadow
          appearance-none
          border
          rounded
          w-full
          py-2
          px-3
          text-gray-700
          leading-tight
          focus:outline-none focus:shadow-outline
        "
        id="user"
        v-model="task.user_id"
      >
        <option v-for="user in users" :key="user.id" v-bind:value="user.id">
          {{ user.name }}
        </option>
      </select>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="due-date">
        Due Date
      </label>
      <input
        class="
          shadow
          appearance-none
          border
          rounded
          w-full
          py-2
          px-3
          text-gray-700
          leading-tight
          focus:outline-none focus:shadow-outline
        "
        id="due-date"
        type="date"
        v-model="task.due_date"
      />
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="due-time">
        Due Time
      </label>
      <input
        type="time"
        class="
          shadow
          appearance-none
          border
          rounded
          w-full
          py-2
          px-3
          text-gray-700
          leading-tight
          focus:outline-none focus:shadow-outline
        "
        id="due-time"
        v-model="task.due_time"
      />
    </div>
  </form>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  props: {
    task: {
      required: true,
    },
  },
  mounted() {
    this.fetchUsers();
  },
  computed: {
    ...mapGetters({
      users: "users/list",
    }),
  },
  methods: {
    ...mapActions({ fetchUsers: "users/fetchList" }),
  },
};
</script>
