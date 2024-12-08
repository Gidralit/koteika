import {$api} from "@/api/index.js";

export const registration = (name, phone, email, password, password_confirmation, avatar) => $api.post('register', {
    name,
    phone,
    email,
    password,
    password_confirmation,
    avatar
}, { headers: { "Content-Type": "multipart/form-data" } })
