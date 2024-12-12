import {reactive, ref} from 'vue'
import { defineStore } from 'pinia'
import { RoomApi } from '@/api'

export const useRoomStore = defineStore('room', () => {
    const rooms = ref([])
    const filters = reactive({
        order_by: 'desc',
        min_price: 0,
        max_price: null,
        equipments_names: [],
        dimensions: null
    })
    const initFilters = ref({})
    const equipments = ref([])

    const getRoom = async () => {
        const response = await RoomApi.getRooms({
            order_by: filters.order_by || undefined,
            min_price: filters.min_price || undefined,
            max_price: filters.max_price || undefined,
            equipments_names: filters.equipments_names || undefined,
            dimensions: filters.dimensions || undefined,
        })
        rooms.value = response.data
        return true
    }

    const getFilters = async () => {
        const response = await RoomApi.getFilters()
        initFilters.value = response.data
    }

    const getEquipment = async () => {
        const response = await RoomApi.getEquipments()
        equipments.value = response.data
    }

    const resetFilter = () => {
        filters.order_by = 'desc'
        filters.min_price = 0
        filters.max_price = null
        filters.equipments_names = []
        filters.dimensions = null
        getRoom().then(() => true)
    }

    return {
        rooms,
        filters,
        initFilters,
        equipments,
        getRoom,
        getFilters,
        getEquipment,
        resetFilter
    }
})