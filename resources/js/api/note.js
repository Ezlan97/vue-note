import Api from './api'
import Csrf from './csrf'

export default {
    async getAllNote(user_id) {
        await Csrf.getCookie();
        return Api.get("/notes/" + user_id)
    },

    async saveNote(form) {
        await Csrf.getCookie();
        return Api.post("/notes/store", form)
    },

    async updateNote(user_id, form) {
        await Csrf.getCookie();
        return Api.post("/notes/update/" + user_id, form)
    }
}