<script setup>
import { reactive } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'

const props = defineProps({
  row: Object, // получаем { id: 1, ... }
})
const emit = defineEmits(['remove'])

const today = new Date()
const plus7 = new Date(today) // создаём копию
plus7.setDate(today.getDate() + 7)
const page = usePage()

function handleRemove() {
  emit('remove', props.row.id)
}

const form = useForm({
  event_date: plus7.toISOString().split('T')[0],
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

const formatted = plus7.toISOString().split('T')[0]

</script>

<template>
	<tr>
            <td class="border border-gray-700 p-2">
              <input v-model="form.event_date"  type="date" class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.work_start_time" type="time"  class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.work_end_time" type="time" class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.workers_number" type="number" class="w-full"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.event_start_time" type="time"  class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.event_end_time" type="time"  class="w-auto"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.guests_number" type="number" class="w-full"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.duty_content" type="text" class="w-full"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.venue_name" type="text" class="w-full"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.position" type="text" class="w-full"/>
            </td>
            <td class="border border-gray-700 p-2">
              <input v-model="form.comments" type="text" class="w-full"/>
            </td>
			<td class="border border-gray-700 p-2">
              <button  @click="handleRemove" class="text-red-500 cursor-pointer">削除</button>
            </td>
    </tr>
</template>
