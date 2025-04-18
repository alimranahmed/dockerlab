<script setup>
import {onMounted, ref} from "vue";

const tasks = ref([]);
const url = import.meta.env.VITE_API_URL;

const taskName = ref('');

onMounted(async() => {
  await fetchTasks();
})

const fetchTasks = async () => {
  tasks.value = await fetch(`${url}/tasks`).then(res => res.json());
}

const deleteTask = async (task) => {
  await fetch(
      `${url}/tasks/?id=${task.id}`,
      {
        method: "DELETE",
      }
  );

  await  fetchTasks()
}

const addTask = async () => {
  if (taskName.value.length === 0) {
    return;
  }
  await fetch(`${url}/tasks`, {
    method: "POST",
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      task: taskName.value,
    })
  });
  taskName.value = '';
  await  fetchTasks()
}
</script>

<template>
  <h3 class="underline font-medium">Tasks</h3>

  <ul class="list-disc list-inside">
    <li v-for="task in tasks">
      {{task.name}}
      <a @click.prevent="deleteTask(task)" class="text-red-400 cursor-pointer">x</a>
    </li>
  </ul>

  <form class="flex gap-3 mt-5" @submit.prevent="addTask()">

    <input type="text" autofocus
           v-model="taskName"
           placeholder="Task Name"
           class="border border-slate-200 rounded-md px-1"/>

    <button type="submit" class="cursor-pointer border border-slate-200 px-2 py-1 rounded-md">Add</button>

  </form>
</template>

<style scoped>

</style>