import { ref } from 'vue'
import { defineStore } from 'pinia'
import { RoomApi } from '@/api'

export const useRoomStore = defineStore('room', () => {
    const rooms = ref([
        {
            id: 1,
            title: "Кошачий рай",
            size: {
                height: 2,
                length: 3,
                width: 3,
            },
            equipment: ['Игрушки', "Когтеточка"],
            price: 1000,
            photo: 'https://i.pinimg.com/736x/10/bc/bd/10bcbdc51fdacda178fbf70267e19251.jpg'
        },
        {
            id: 2,
            title: 'Собачий рай',
            size: {
                height: 2,
                length: 2,
                width: 2,
            },
            equipment: ['Игрушки', "Когтеточка"],
            price: 1500,
            photo: 'https://i.pinimg.com/736x/10/bc/bd/10bcbdc51fdacda178fbf70267e19251.jpg'
        },
        {
            id: 3,
            title: 'Недорого и удобно',
            size: {
                height: 2,
                length: 1,
                width: 2,
            },
            equipment: ['Бюджетно', 'Уютно'],
            price: 800,
            photo: 'https://i.pinimg.com/736x/10/bc/bd/10bcbdc51fdacda178fbf70267e19251.jpg'
        },
        {
            id: 4,
            title: 'Для маленьких',
            size: {
                height: 2,
                length: 2,
                width: 2,
            },
            equipment: ['Игрушки', "Повышенный уход"],
            price: 2500,
            photo: 'https://i.pinimg.com/736x/10/bc/bd/10bcbdc51fdacda178fbf70267e19251.jpg'
        }
    ])

    const getRooms = () => {
        RoomApi.getRooms().then((data) => rooms.value = data.data)
    }

    return {
        rooms,
        getRooms
    }
})