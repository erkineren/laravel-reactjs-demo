import './App.css';
import {useContext, useEffect} from "react";
import {AppContext} from "./context";
import {ToastContainer} from "react-toastify";
import 'react-toastify/dist/ReactToastify.css';
import {Link, useHistory} from "react-router-dom";
import {Container, Menu} from "semantic-ui-react";

function App() {
    const ctx = useContext(AppContext)
    const history = useHistory();

    useEffect(() => {

        if (ctx.store.token) {
            ctx.api.setToken(ctx.store.token)
            history.push('/home')
        } else {
            history.push('/login')
        }
    }, [history, ctx.store.token])


    function renderMenu() {
        return ctx.store.token ? (
            <Menu borderless style={{marginBottom: '2rem'}}>
                <Container text>
                    <Menu.Item header>
                        <Link to='/home'>CRUD</Link>
                    </Menu.Item>

                    <Menu.Item>
                        <Link to='/courses'>Courses</Link>
                    </Menu.Item>
                    <Menu.Item>
                        <Link to='/lectures'>Lectures</Link>
                    </Menu.Item>
                    <Menu.Item>
                        <Link to='/homeworks'>Homeworks</Link>
                    </Menu.Item>
                    <Menu.Item>
                        <Link to='/purchases'>Purchases</Link>
                    </Menu.Item>
                    <Menu.Item>
                        <Link to='/users'>Users</Link>
                    </Menu.Item>
                    <Menu.Item>
                        <Link to='/logout'>Logout</Link>
                    </Menu.Item>

                </Container>
            </Menu>
        ) : (<div/>)
    }

    return (

        <div className="App">

            <ToastContainer
                position="bottom-right"
                autoClose={2000}
                newestOnTop={true}
                closeOnClick
                rtl={false}
                pauseOnFocusLoss
                draggable
                pauseOnHover
            />

            {renderMenu()}

        </div>

    );
}


export default App;
