import axios from 'axios'

let Api = axios.create({
    baseURL: 'http://vue-note.local/api/'
})

Api.defaults.withCredentials = true;

export default Api