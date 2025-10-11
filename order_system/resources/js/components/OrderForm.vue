<script setup lang="ts">
import { reactive } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'


const today = new Date()
const formatted = today.toISOString().split('T')[0]

const page = usePage()
// локальное состояние формы
const form = useForm({
  event_date: formatted,
  work_start_time: '',
  work_end_time:'',
  workers_number: 0,
  venue_name:'',
  event_start_time: '',
  event_end_time: '',
  guests_number: 0,
  duty_content:'',
  position:'',
  comments:'',
  hotel_id: page.props.auth.user.hotel_id,
  dep_id: page.props.auth.user.dep_id,
  coor_id: page.props.auth.user.coor_id,
})

// отправка
function submit() {
  form.post('/orders')
}
</script>

<template>
  
    <form @submit.prevent="submit" class="border-b border-white/10 pb-12">
      <table class="table-fixed w-full border border-gray-700 text-center">
        <thead>
          <tr class='bg-gray-800 text-white'>
            <th class="border border-gray-700 w-1/10 p-2">
              <div >
              <label>Event date</label>
              <!-- <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div> -->
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div  class='border '>
                <label class="block text-base/7 font-semibold text-white">Work start time</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border '>
                <label class="block text-base/7 font-semibold text-white">Work end time</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div  class='border'>
                <label class="block text-base/7 font-semibold text-white">Workers number</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border'>
                <label class="block text-base/7 font-semibold text-white">Event start time</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border'>
                <label class="block text-base/7 font-semibold text-white">Event end time</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border'>
                <label class="block text-base/7 font-semibold text-white">Guests number</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border'>
                <label class="block text-base/7 font-semibold text-white">Duty content</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border'>
                <label class="block text-base/7 font-semibold text-white">Venue name</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border'>
                <label class="block text-base/7 font-semibold text-white">Position</label>
              </div>
            </th>
            <th class="border border-gray-700 w-1/10 p-2">
              <div class='border'>
                <label class="block text-base/7 font-semibold text-white">Comments</label>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border border-gray-700 p-2">
              <input v-model="form.event_date"  type="date" class="w-<90>"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.work_start_time" type="time"  class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.work_end_time" type="time" class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.workers_number" type="number" class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.event_start_time" type="time"  class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.event_end_time" type="time"  class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.guests_number" type="number" class="w-<90>"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.duty_content" type="text" class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.venue_name" type="text" class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.position" type="text" class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.comments" type="text" class="w-auto"/>
            </td>
          </tr>
            
        </tbody>
    </table>
    <div class="flex justify-center w-100%">
        <button type="submit" class="btn btn-primary bg-green-300 p-2 rounded-md w-40 mt-7">Отправить</button>
      </div>
    </form>
  
</template>
