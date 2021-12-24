import axios from "axios";

let Api = axios.create({
    baseURL: window.origin,
    headers: {
        "Content-type": "application/json",
    },
});

Api.defaults.withCredentials = true;

export default Api;