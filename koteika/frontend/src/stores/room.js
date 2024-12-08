import { ref } from 'vue'
import { defineStore } from 'pinia'
import { RoomApi } from '@/api'

export const useRoomStore = defineStore('room', () => {
    const rooms = ref([])

    const getRoom = async () => {
        const response = await RoomApi.getRooms()
        rooms.value = response.data
        return true
    }

    return {
        rooms,
        getRoom
    }
})