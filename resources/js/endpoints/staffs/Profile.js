import Http from "../../helpers/Http";

class Profile {
    getProfile = () => Http.get("api/v1/staffs/profile")

    updateProfile = (data) => Http.update("api/v1/staffs/profile", data)
}
export default new Profile;