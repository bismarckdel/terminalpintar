<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Kelola Berita</h1>

    <form @submit.prevent="submit">
      <div class="grid gap-2">
        <input v-model="form.judul" placeholder="Judul" class="border p-2" />
        <textarea v-model="form.konten" placeholder="Konten" class="border p-2"></textarea>
        <input v-model="form.penulis_id" placeholder="Penulis ID" class="border p-2" />
        <button class="bg-blue-600 text-white p-2 rounded">Buat</button>
      </div>
    </form>

    <hr class="my-4" />

    <ul>
      <li v-for="b in berita.data" :key="b.id" class="py-2">{{ b.judul }} - oleh {{ b.penulis_id }}</li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const berita = ref({ data: [] })
const form = ref({ judul: '', konten: '', penulis_id: null })

async function load() {
  const res = await axios.get('/api/admin/berita')
  berita.value = res.data
}

async function submit() {
  await axios.post('/api/admin/berita', form.value)
  form.value = { judul: '', konten: '', penulis_id: null }
  await load()
}

onMounted(load)
</script>

<style scoped>
</style>
