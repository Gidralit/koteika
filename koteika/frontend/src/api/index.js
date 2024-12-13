import axios from "axios";

export const $api = axios.create({baseURL: 'http://localhost/api/booking', headers: { Accept: 'application/json' }})
export * as HeaderApi from './headers'
export * as RoomApi from './rooms'
export * as ContactApi from './contacts'
export * as ReviewApi from './reviews'
export * as AuthApi from './auth'
export * as ProfileApi from './profile'
