import {Form} from "semantic-ui-react";
import EntityForm from "../../components/EntityUI/EntityForm";
import {useContext} from "react";
import {AppContext} from "../../context";

function HomeworkForm() {
    const ctx = useContext(AppContext)

    return (
        <EntityForm
            route={'homeworks'}
            render={(data, onChange, state, setState) => (
                <>
                    <Form.Select
                        options={(
                            () => {

                                if (!state.lectures) {
                                    ctx.api
                                        .get(`/lectures`)
                                        .then(res => {
                                            setState({
                                                ...state,
                                                lectures: res.data.map((d) => {
                                                    return {
                                                        key: d.id,
                                                        text: d.title,
                                                        value: d.id
                                                    }
                                                })

                                            })
                                        })
                                }


                                return state.lectures ?? [];
                            }
                        )()}
                        onChange={onChange}
                        name={"lecture_id"}
                        value={data.lecture_id ?? ''}
                    />
                    <Form.Input
                        onChange={onChange}
                        name={"title"}
                        value={data.title ?? ''}
                        placeholder={"Title"}
                    />
                    <Form.Input
                        onChange={onChange}
                        name={"description"}
                        value={data.description ?? ''}
                        placeholder={"Description"}
                    />
                    <Form.Input
                        onChange={onChange}
                        name={"due_at"}
                        value={data.due_at ?? ''}
                        placeholder={"Due At"}
                    />
                </>
            )}
        />
    )
}

export default HomeworkForm