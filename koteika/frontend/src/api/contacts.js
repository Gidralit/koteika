import { $api } from "@/api/index.js";


export const getContacts = () => $api.get('contacts')