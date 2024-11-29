import axios from "axios";

export const $api = axios.create({baseURL: 'http://localhost/api/'})
export * as HeaderApi from './headers'
export * as RoomApi from './rooms'