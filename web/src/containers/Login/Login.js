import {AppContext} from "../../context";
import {useHistory} from "react-router-dom";
import {useContext, useState} from "react";
import {Button, Form, Grid, Header, Segment} from 'semantic-ui-react'
import {toast} from "react-toastify";


function Login() {
    const ctx = useContext(AppContext)
    const history = useHistory();
    const [form, setForm] = useState({})

    const handleChange = (e, {name, value}) => {
        setForm({
            ...form,
            ...{[name]: value}
        })
    };

    const handleSubmit = () => {
        login(form.email, form.password)
    }

    function login(email, password) {
        ctx.api
            .login(email, password)
            .then((res) => {
                console.log('res', res)
                toast("Login success")
                localStorage.setItem('token', res.data.token);
                ctx.actions.setToken(res.data.token)
                // setTimeout(() => history.push('/home'), 500)
            })
            .catch((e) => {
                const res = e.response.data;

                if (res.message) {
                    toast.error(res.message)
                }

            })
    }


    return (
        <Grid textAlign='center' style={{height: '100vh'}} verticalAlign='middle'>
            <Grid.Column style={{maxWidth: 450}}>
                <Header as='h2' color='teal' textAlign='center'>
                    Log-in to your account
                </Header>
                <Form size='large' onSubmit={handleSubmit}>
                    <Segment stacked>
                        <Form.Input
                            fluid icon='user'
                            iconPosition='left'
                            placeholder='E-mail address'
                            onChange={handleChange}
                            name={"email"}
                        />
                        <Form.Input
                            fluid
                            icon='lock'
                            iconPosition='left'
                            placeholder='Password'
                            type='password'
                            onChange={handleChange}
                            name={"password"}
                        />

                        <Button color='teal' fluid size='large'>
                            Login
                        </Button>
                    </Segment>
                </Form>

            </Grid.Column>
        </Grid>
    )
}


export default Login