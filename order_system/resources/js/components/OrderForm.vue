<script setup lang="ts">
import { reactive } from 'vue'
import { useForm } from '@inertiajs/vue3'


// локальное состояние формы
const form = useForm({
  title: '',
  description: '',
  date: '',
})

// отправка
function submit() {
  form.post('/orders')
}
</script>

<template>
  <form @submit.prevent="submit" class="space-y-4">
    <div>
      <label class="block font-medium">Название</label>
      <input v-model="form.title" type="text" class="input" />
      <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div>
    </div>

    <div>
      <label class="block font-medium">Описание</label>
      <textarea v-model="form.description" class="input"></textarea>
    </div>

    <div>
      <label class="block font-medium">Дата</label>
      <input v-model="form.date" type="date" class="input" />
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
</template>
