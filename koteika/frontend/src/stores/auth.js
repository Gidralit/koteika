import { defineStore } from "pinia";
import axios from "axios";
import {computed, ref} from "vue";
import { AuthApi } from '@/api'

export const useAuthStore = defineStore('auth', () => {
    const authToken = ref(localStorage.getItem('user-token'))
    const errorStatusReg = ref([])
    const errorStatusLog = ref([])
    const isAuth = computed(() => {
        return authToken.value
    })

    const errorHandler = (errors) => {
        Object.values(errors).forEach(error => {
            errorStatusReg.value.push(error[0])
            console.log(errorStatusReg.value)
        })
    }

    const setToken = (token) => {
        authToken.value = token
        localStorage.setItem('user-token', token)
    }

    const register = async (name, phone, email, password, password_confirmation, avatar) => {
        try{
            const response = await AuthApi.registration(name, phone, email, password, password_confirmation, avatar)
            if (response.data.errors){
                errorHandler(response.data.errors)
                return false
            }
            return true
        }
        catch (e){
            console.log(e)
            if (e){
                errorHandler(e.errors)
                return false
            }
        }
    }

    const login = async (email, password) => {
        try{
            const response = await AuthApi.login(email, password)
            if (response.data.token){
                setToken(response.data.token)
                return true
            }
            if (response.data.errors){
                Object.values(response.data.errors).forEach(errors => {
                    errorStatusLog.value.push(errors[0])
                })
                return false
            }

        }
        catch (e){
            console.log(e)
        }
    }

    const logout = async (email, password) => {
        authToken.value = null
        localStorage.removeItem('user-token')
    }

    return {
        register,
        login,
        logout,
        isAuth
    }
})