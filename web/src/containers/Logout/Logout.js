import {AppContext} from "../../context";
import {useHistory} from "react-router-dom";
import {useContext, useEffect} from "react";

function Logout() {
    const ctx = useContext(AppContext)
    const history = useHistory();

    useEffect(() => {
        localStorage.removeItem('token')
        ctx.actions.setToken(null)
        history.push('/login')
    }, [history, ctx.store.token, ctx.actions])


    return (<div></div>)
}

export default Logout