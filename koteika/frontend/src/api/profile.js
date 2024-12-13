import { $api } from "@/api/index.js";
import {useAuthStore} from "@/stores/auth.js";

export const getProfile = () => {
    const { authToken } = useAuthStore()
    return $api.get(
        'user',
        { headers: { 'Authorization': `Bearer ${authToken}`}}
    )
}