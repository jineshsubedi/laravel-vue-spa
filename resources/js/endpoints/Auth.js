import Api from "../helpers/Http";

class Auth {
    login = (data) => Api.post("api/v1/login", data)

    logout = () => Api.post("api/v1/logout")

    getUser = () => Api.get("api/v1/user")
}
export default new Auth;