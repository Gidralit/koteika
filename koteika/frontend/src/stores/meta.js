import { ref } from 'vue'
import { defineStore } from 'pinia'
import { HeaderApi, ContactApi } from "@/api"

export const useMetaStore = defineStore('meta', () => {
    const headerData = ref({
        title: "Котейки",
        text: "Пушистые мечты",
        city: "Москва"
    })

    const contactsData = ref({
        address: "Москва, Большая садовая, 228",
        works_with: "9:00",
        works_until: "19:00",
        telephone: "+7(123)456-78-90",
        email: "info@pushistyuyut.ru",
        link_to_vk: "https://vk.com/",
        link_to_instagram: "https://www.whatsapp.com/",
        link_to_telegram: "https://telegram.org/",
    })

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
