import { ref } from "vue"
import {defineStore} from "pinia";
import { ReviewApi } from "@/api"

export const useReviewStore = defineStore('review', () => {
    const reviewData = ref({})

    const getReviews = async () => {
        const response = await ReviewApi.getReviews()
        reviewData.value = response.data
        return true
    }
    return {
        reviewData,
        getReviews
    }
})