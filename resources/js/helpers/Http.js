import axios from "axios";

let Api = axios.create({
    baseURL: process.env.APP_URL
});

Api.defaults.withCredentials = true;

export default Api;