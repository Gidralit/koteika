import axios from "axios";

export const $api = axios.create({baseURL: 'http://localhost/api/'})
export * from './headers'