import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useRoomStore = defineStore('room', () => {
    const rooms = ref([
        {
            title: "Кошачий рай",
            size: {
                height: 2,
                length: 3,
                width: 3,
            },
            equipment: ['Игрушки', "Когтеточка"],
            price: 100,
            photo: 'https://i.pinimg.com/736x/10/bc/bd/10bcbdc51fdacda178fbf70267e19251.jpg'
        },
        {
            title: 'Собачий рай',
            size: {
                height: 2,
                length: 2,
                width: 2,
            },
            equipment: ['Игрушки', "Когтеточка"],
        }

    ])
})