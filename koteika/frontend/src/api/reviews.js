import {$api} from "@/api/index.js";

export const getReviews = () => $api.get('reviews/random')