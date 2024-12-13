import { defineStore } from "pinia";
import axios from "axios";
import {computed, ref} from "vue";
import { AuthApi } from '@/api'

export const useAuthStore = defineStore('auth', () => {
    const authToken = ref(localStorage.getItem('user-token'))
    const errorStatusReg = ref([])
    const errorStatusLog = ref(false)
    const isAuth = computed(() => {
        return authToken.value
    })

    const errorHandlerReg = (errors) => {
        Object.values(errors).forEach(error => {
            errorStatusReg.value.push(error[0])
        })
    }

    const setToken = (token) => {
        authToken.value = token
        localStorage.setItem('user-token', token)
    }

    const register = async (name, phone, email, password, password_confirmation, avatar) => {
        errorStatusReg.value = []
        try{
            const response = await AuthApi.registration(name, phone, email, password, password_confirmation, avatar)
            if (response.data.errors){
                errorHandlerReg(response.data.errors)
                return false
            }
            return true
        }
        catch (e){
            if (e){
                errorHandlerReg(e.response.data)
                return false
            }
        }
    }

    const login = async (email, password) => {
        errorStatusLog.value = false
        try{
            const response = await AuthApi.login(email, password)
            if (response.data.token){
                setToken(response.data.token)
                return true
            }
            if (response.data.errors){
                errorStatusLog.value = true
                return false
            }

        }
        catch (e){
            if (e){
                errorStatusLog.value = true
                return false
            }
        }
    }

    const logout = () => {
        authToken.value = null
        localStorage.removeItem('user-token')
    }

    return {
        register,
        login,
        logout,
        errorStatusReg,
        errorStatusLog,
        authToken,
        isAuth
    }
})