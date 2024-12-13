import { defineStore } from "pinia";
import { ProfileApi } from '@/api'
import {ref} from "vue";

export const useProfileStore = defineStore('profile', () => {
    const profileData = ref({})

    const getProfile = async () => {
        const response = await ProfileApi.getProfile()
        profileData.value = response.data
        return true
    }
    return{
        profileData,
        getProfile
    }
})