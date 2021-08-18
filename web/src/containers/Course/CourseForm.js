import {Form} from "semantic-ui-react";
import EntityForm from "../../components/EntityUI/EntityForm";

function CourseForm() {


    return (
        <EntityForm
            route={'courses'}
            render={(data, onChange) => (
                <>
                    <Form.Input
                        onChange={onChange}
                        name={"title"}
                        value={data.title ?? ''}
                        placeholder={"Title"}
                    />
                    <Form.Input
                        type={'number'}
                        min="1" step="any"
                        onChange={onChange}
                        name={"price"}
                        value={data.price ?? ''}
                        placeholder={"Price"}
                    />
                    <Form.TextArea
                        rows={15}
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

export default CourseForm