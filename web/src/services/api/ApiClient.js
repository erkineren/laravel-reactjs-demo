import axios from "axios";


class ApiClient {

    constructor(baseURL) {
        console.log("ApiClient::constructor")
        this.client = axios.create({
            baseURL: baseURL,
            headers: {
                common: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',

                }
            }
        });
    }

    get = (url, params) => this.client.get(url)
    post = (url, data) => this.client.post(url, data)
    put = (url, data) => this.client.put(url, data)
    delete = (url) => this.client.delete(url)


    login(email, password) {
        return this.post('/token', {
            email: email,
            password: password
        }).then((res) => {
            this.setToken(res.data.token)
            return res
        })
    }

    setToken(token) {
        this.client.defaults.headers.common['Authorization'] = 'Bearer ' + token
    }

}

export default ApiClient;