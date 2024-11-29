import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { getHeaders } from "@/api";

export const useMetaStore = defineStore('meta', () => {
    const headerSave = ref({

    })
    const getHeader = () => {
        getHeaders().then((data) => headerSave.value = data.data)
    }
    return {
        headerSave,
        getHeader
    }
})
