<template>
<div>
  <Dashboard v-if="tasks.length"/>
</div>
</template>

<script>
import Dashboard from '~/components/Dashboard'
import {mapGetters, mapActions} from 'vuex'

export default {
  components: {Dashboard},
  mounted() {
    this.fetchTasks()
  },
  computed: {
    ...mapGetters({
      tasks: 'tasks/list'
    })
  },
  methods: {
    ...mapActions({
      fetchTasks: 'tasks/fetchList'
    })
  }
}
</script>
