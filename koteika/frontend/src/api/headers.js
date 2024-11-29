import { $api } from "@/api/index.js";


export const getHeaders = () => $api.get('headers')