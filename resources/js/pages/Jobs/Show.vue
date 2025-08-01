<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">{{ job.title }}</h1>
    <p>Location: {{ job.location }}</p>
    <p>Salary: {{ job.salary }}</p>
    <p>Work Type: {{ job.work_type }}</p>
  </div>
</template>

<script setup>
defineProps({ job: Object })
</script>
