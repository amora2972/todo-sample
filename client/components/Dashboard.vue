<template>
  <div class="p-10">
      <Pie :data="chartData" :options="options" :styles="myStyles" />
  </div>
</template>

<script>
import Pie from '~/components/Pie'
import {mapGetters} from 'vuex'

export default {
    components: {Pie},
    computed: {
        ...mapGetters({
            tasks: 'tasks/list'
        }),
        chartData() {
            return {
                hoverBackgroundColor: "red",
                hoverBorderWidth: 10,
                labels: ["Completed Tasks", "Pending Tasks"],
                datasets: [
                    {
                        label: "Data One",
                        backgroundColor: ["#41B883", "#E46651"],
                        data: [this.completedTasks, this.pendingTasks]
                    }
                ]
            }
        },
        options() {
            return {
                responsive: false,
                maintainAspectRatio: false,
                title: {
                    display: false,
                },
            }
        },
        myStyles() {
            return {
                width: '25%',
                position: 'relative'
            }
        },
        completedTasks() {
            return this.tasks.filter(task => task.status === 1).length
        },
        pendingTasks() {
            return this.tasks.length - this.completedTasks
        }
    }
}
</script>
