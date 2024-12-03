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
        worksWith: "9:00",
        worksUntil: "19:00",
        phone: "+7(123)456-78-90",
        email: "info@pushistyuyut.ru",
        link_to_vk: "https://vk.com/",
        link_to_instagram: "https://www.whatsapp.com/",
        link_to_telegram: "https://telegram.org/",
    })

    const getHeader = () => {
        HeaderApi.getHeaders().then((data) => headerData.value = data.data[0])
    }

    const getContacts = () => {
        ContactApi.getContacts().then((data) => contactsData.value = data.data[0])
    }

    return {
        headerData,
        contactsData,
        getHeader,
        getContacts,
    }
})
