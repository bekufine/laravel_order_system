<script setup>
import { reactive, ref } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import TableComponent from './TableComponent.vue'

// текущая дата + 7 дней
const today = new Date()
const plus7 = new Date(today)
plus7.setDate(today.getDate() + 7)
const formatted = plus7.toISOString().split('T')[0]

// список строк таблицы
const rows = ref([{ id: 1 }])

// страница (Inertia)


// форма
const page = usePage()
const form = useForm({
  event_date: formatted,
  work_start_time: '',
  work_end_time: '',
  workers_number: 0,
  venue_name: '',
  event_start_time: '',
  event_end_time: '',
  guests_number: 0,
  duty_content: '',
  position: '',
  comments: '',
  hotel_id: page.props.auth.user.hotel_id,
  dep_id: page.props.auth.user.dep_id,
  coor_id: page.props.auth.user.coor_id,
})

// список компонентов (ID)
const components = ref([1])

// добавление новой строки таблицы
function addTableComponent() {
  const nextId = Math.max(0, ...rows.value.map(r => r.id)) + 1
  rows.value.push({ id: nextId })
}

// удаление строки (если понадобится)
function removeRow(id) {
  rows.value = rows.value.filter(r => r.id !== id)
}

// отправка формы
function submit() {
  form.post('/orders')
}
</script>

<template>
  <form @submit.prevent="submit" class="border-b border-white/10 pb-12">
    <table class="table-fixed w-full border border-gray-700 text-center">
      <thead>
        <tr class="bg-gray-800 text-white">
          <th class="border border-gray-700 w-1/10 p-2">
            <label>Event date</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Work start time</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Work end time</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Workers number</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Event start time</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Event end time</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Guests number</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Duty content</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Venue name</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Position</label>
          </th>
          <th class="border border-gray-700 w-1/10 p-2">
            <label class="block text-base/7 font-semibold text-white">Comments</label>
          </th>
          <th class="border border-gray-700 w-15 p-2"></th>
        </tr>
      </thead>

      <tbody>
        <TableComponent
          v-for="row in rows"
          :key="row.id"
          :row="row"
          @remove="removeRow"
        />
      </tbody>
    </table>

    <div class="flex justify-center w-full">
      <button
        @click.prevent="addTableComponent"
        type="button"
        class="btn btn-primary bg-white p-2 rounded-md w-40 mt-7 text-black cursor-pointer"
      >
        New row
      </button>
    </div>

    <div class="flex justify-center w-full">
      <button
        type="submit"
        class="btn btn-primary bg-[#0c3d59] p-2 rounded-md w-40 mt-7 cursor-pointer"
      >
        Отправить
      </button>
    </div>
  </form>
</template>
