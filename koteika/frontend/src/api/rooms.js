import { $api } from '@/api/index.js'

export const getRooms = (params) => $api.get('rooms', { params })
export const getFilters = () => $api.get('filters_data')
export const getEquipments = () => $api.get('equipments')