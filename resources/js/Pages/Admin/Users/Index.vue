<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Kelola Pengguna</h1>

    <form @submit.prevent="submit">
      <div class="grid gap-2">
        <input v-model="form.nama" placeholder="Nama" class="border p-2" />
        <input v-model="form.email" placeholder="Email" class="border p-2" />
        <input v-model="form.password" placeholder="Password" type="password" class="border p-2" />
        <button class="bg-blue-600 text-white p-2 rounded">Buat</button>
      </div>
    </form>

    <hr class="my-4" />

    <ul>
      <li v-for="user in users.data" :key="user.id" class="py-2">{{ user.nama }} ({{ user.email }})</li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const users = ref({ data: [] })
const form = ref({ nama: '', email: '', password: '' })

async function load() {
  const res = await axios.get('/api/admin/users')
  users.value = res.data
}

async function submit() {
  await axios.post('/api/admin/users', form.value)
  form.value = { nama: '', email: '', password: '' }
  await load()
}

onMounted(load)
</script>

<style scoped>
</style>
