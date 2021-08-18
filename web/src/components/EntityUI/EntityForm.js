import {Button, Container, Form, Icon, Segment} from "semantic-ui-react";
import {useContext, useEffect, useState} from "react";
import {AppContext} from "../../context";
import {useHistory, useParams} from "react-router-dom";
import {toast} from "react-toastify";
import {catchErrorMessage} from "../../helpers";

function EntityForm({route, render}) {
    let {id} = useParams();
    const ctx = useContext(AppContext)
    const history = useHistory()
    const [data, setData] = useState({})
    const [fields, setFields] = useState([])
    const [state, setState] = useState({})


    const fetch = () => {
        ctx.api
            .get(`/${route}/${id}`)
            .then(res => {
                setData(res.data)
                const comps = render(res.data, onChange, state, setState)
                setFields(comps.props.children.map((c) => c.props.name))
            })
            .catch(e => {
                return catchErrorMessage(e)
            })

    }

    useEffect(() => {
        if (!isNaN(id)) {
            fetch()
        }

    }, [])

    const onChange = (e, {name, value}) => {
        setData({
            ...data,
            ...{[name]: value}
        })
    };

    const handleSubmit = (e) => {
        let formData = {};
        for (let k in data) {
            if (fields.includes(k)) {
                formData[k] = data[k];
            }
        }

        if (!isNaN(id)) {
            ctx
                .api
                .put(`/${route}/${id}`, formData)
                .then(res => {
                    toast("Saved #" + id)
                    history.goBack()
                })
                .catch(catchErrorMessage)
        } else {
            ctx
                .api
                .post(`/${route}`, formData)
                .then(res => {
                    toast("Saved #" + id)
                    history.goBack()
                })
                .catch(catchErrorMessage)
        }

        e.preventDefault();
    }

    return (
        <Container>
            <Form size='large' onSubmit={handleSubmit}>
                <Segment>
                    {render(data, onChange, state, setState)}
                    <div className={'center'}>
                        <Button color='green'>
                            <Icon name='save'/> Save
                        </Button>
                    </div>

                </Segment>
            </Form>
        </Container>
    )
}

export default EntityForm