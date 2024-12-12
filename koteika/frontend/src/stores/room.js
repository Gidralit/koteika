import {reactive, ref} from 'vue'
import { defineStore } from 'pinia'
import { RoomApi } from '@/api'

export const useRoomStore = defineStore('room', () => {
    const rooms = ref([])
    const filters = reactive({
        order_by: 'desc',
        min_price: 0,
        max_price: null,
        equipments_names: '',
        square: ''
    })
    const initFilters = ref({})


    const getRoom = async () => {
        const response = await RoomApi.getRooms({
            order_by: filters.order_by || undefined,
            min_price: filters.min_price || undefined,
            max_price: filters.max_price || undefined,
            equipments_names: filters.equipments_names || undefined,
            square: filters.square || undefined,
        })
        rooms.value = response.data
        return true
    }

    const getFilters = async () => {
        const response = await RoomApi.getFilters()
        initFilters.value = response.data
    }

    const getequipment = async () => {
        const response = await RoomApi.getEquipments()

    }

    return {
        rooms,
        filters,
        initFilters,
        getRoom,
        getFilters
    }
})