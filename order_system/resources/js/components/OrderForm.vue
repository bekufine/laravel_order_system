<script setup lang="ts">
import { reactive } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'




const page = usePage()
// локальное состояние формы
const form = useForm({
  event_date: '',
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
  <form @submit.prevent="submit" class="space-y-4 bg-[#919191]">
    <div>
      <label class="block font-medium text-black">Event date</label>
      <input v-model="form.event_date"  type="date" class="border border-white-500 bg-black text-white rounded px-2 py-1" />
      <!-- <div v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</div> -->
    </div>

    <div>
      <label class="block font-medium text-black">Work start time</label>
      <input v-model="form.work_start_time" type="text" class="border border-white-500 bg-black text-white rounded px-2 py-1"></input>
    </div>

    <div>
      <label class="block font-medium text-black">Work end time</label>
      <input v-model="form.work_end_time" type="text"  class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Workers number</label>
      <input v-model="form.workers_number" type="number" class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Event start time</label>
      <input v-model="form.event_start_time" type="text"  class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Event end time</label>
      <input v-model="form.event_end_time" type="text" class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Guests number</label>
      <input v-model="form.guests_number" type="number"  class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Duty content</label>
      <input v-model="form.duty_content" type="text"  class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Venue name</label>
      <input v-model="form.venue_name" type="text" class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Position</label>
      <input v-model="form.position" type="text"  class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <div>
      <label class="block font-medium text-black">Comments</label>
      <input v-model="form.comments" type="text"  class="border border-white-500 bg-black text-white rounded px-2 py-1" />
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
</template>
