import { ref } from 'vue'
import { defineStore } from 'pinia'
import { HeaderApi, ContactApi } from "@/api"

export const useMetaStore = defineStore('meta', () => {
    const headerData = ref({})

    const contactsData = ref({})

    const getHeader = async () => {
        const response = await HeaderApi.getHeaders()
        headerData.value = response.data[0]
        return true
    }

    const getContacts = async () => {
        const response = await ContactApi.getContacts()
        contactsData.value = response.data[0]
        return true
    }

    return {
        headerData,
        contactsData,
        getHeader,
        getContacts,
    }
})
