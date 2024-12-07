import { defineStore } from "pinia";
import axios from "axios";
import {computed, ref} from "vue";
import { AuthApi } from '@/api'

export const useAuthStore = defineStore('auth', () => {
    const authToken = ref(localStorage.getItem('user-token'))
    const errorStatusReg = ref([])
    const errorStatusLog = ref(null)
    const isAuth = computed(() => {
        return authToken.value
    })

    const setToken = (token) => {
        authToken.value = token
        localStorage.setItem('user-token', token)
    }

    const register = async (name, phone, email, password, password_confirmation, avatar) => {
        try{
            await AuthApi.registration(name, phone, email, password, password_confirmation, avatar)
        }
        catch (e){
            Object.values(e.response.data.errors).forEach(errors => {
                errorStatusReg.value.push(errors[0])
            })
        }
    }

    return {
        register
    }
})