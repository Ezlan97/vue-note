import axios from 'axios'

let Api = axios.create({
    baseURL: 'http://vue-note.test/api/'
})

Api.defaults.withCredentials = true;

export default Api