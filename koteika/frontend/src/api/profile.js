import { $api } from "@/api/index.js";

export const getProfile = () => $api.get('user')