import {Form} from "semantic-ui-react";
import EntityForm from "../../components/EntityUI/EntityForm";
import {useContext} from "react";
import {AppContext} from "../../context";

function LectureForm() {
    const ctx = useContext(AppContext)

    return (
        <EntityForm
            route={'lectures'}
            render={(data, onChange, state, setState) => (
                <>
                    <Form.Select
                        options={(
                            () => {

                                if (!state.courses) {
                                    ctx.api
                                        .get(`/courses`)
                                        .then(res => {
                                            setState({
                                                ...state,
                                                courses: res.data.map((d) => {
                                                    return {
                                                        key: d.id,
                                                        text: d.title,
                                                        value: d.id
                                                    }
                                                })

                                            })
                                        })
                                }


                                return state.courses ?? [];
                            }
                        )()}
                        onChange={onChange}
                        name={"course_id"}
                        value={data.course_id ?? ''}
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
                </>
            )}
        />
    )
}

export default LectureForm