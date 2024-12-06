import { ref } from "vue"
import {defineStore} from "pinia";
import { ReviewApi } from "@/api"

export const useReviewStore = defineStore('review', () => {
    const reviewsData = ref([])

    const getReviews = async () => {
        const response = await ReviewApi.getReviews()
        reviewsData.value = response.data
        return true
    }
    return {
        reviewsData,
        getReviews
    }
})