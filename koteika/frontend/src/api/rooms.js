import { $api } from '@/api/index.js'

export const getRooms = (params) => $api.get('rooms', { params })