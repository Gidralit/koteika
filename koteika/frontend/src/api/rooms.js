import { $api } from '@/api/index.js'

export const getRooms = () => $api.get('rooms')