import { ref } from 'vue'
import { defineStore } from 'pinia'
import { HeaderApi } from "@/api"

export const useMetaStore = defineStore('meta', () => {
    const headerData = ref({
        title: "Котейки",
        text: "Пушистые мечты",
        city: "Москва"
    })

    const getHeader = () => {
        HeaderApi.getHeaders().then((data) => headerData.value = data.data[0])
    }

    return {
        headerData,
        getHeader
    }
})
