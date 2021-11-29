<template>
  <div class="p-20">
    <ul class="flex">
      <li class="mr-6">
        <NuxtLink class="text-blue-500 hover:text-blue-800" to="/"
          >Dashboard</NuxtLink
        >
      </li>
      <li class="mr-6">
        <NuxtLink class="text-blue-500 hover:text-blue-800" to="/tasks"
          >Tasks</NuxtLink
        >
      </li>
      <li class="mr-6">
        <NuxtLink
          class="text-blue-500 hover:text-blue-800"
          to="/tasks/completed"
          >Completed Tasks</NuxtLink
        >
      </li>
    </ul>
    <Nuxt />
  </div>
</template>
