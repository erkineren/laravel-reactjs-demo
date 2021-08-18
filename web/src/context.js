import React, {useState} from "react";
import ApiClient from "./services/api/ApiClient";

const apiClient = new ApiClient('http://127.0.0.1:8000/api');
const initialState = {
    token: localStorage.getItem('token')
};

export const AppContext = React.createContext(null);

export const ContextWrapper = (props) => {
    const [api, setApi] = useState(apiClient);

    const [store, setStore] = useState(initialState);

    const [actions, setActions] = useState({
        setUser: user => setStore({...store, ...{user: user}}),
        setToken: token => setStore({...store, ...{token: token}}),
        set: (key, value) => setStore({...store, ...{[key]: value}}),
    });

    return (
        <AppContext.Provider value={{api, store, actions}}>
            {props.children}
        </AppContext.Provider>
    );
}

// export const initialState = {
//     api: new ApiClient('http://127.0.0.1:8000/api'),
// };
// export const AppContext = React.createContext(initialState);