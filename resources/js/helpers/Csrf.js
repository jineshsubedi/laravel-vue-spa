import Api from "./Http";
import Cookie from "js-cookie";

export default {
    getCookie() {
        let token = Cookie.get("XSRF-TOKEN");

        if (token) {
            return new Promise(resolve => {
                resolve(token);
            });
        }

        return Api.get("/csrf-cookie");
    }
};