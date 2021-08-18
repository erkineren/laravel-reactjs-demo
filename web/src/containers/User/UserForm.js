import {Form} from "semantic-ui-react";
import EntityForm from "../../components/EntityUI/EntityForm";

function UserForm() {


    return (
        <EntityForm
            route={'users'}
            render={(data, onChange) => (
                <>
                    <Form.Input
                        onChange={onChange}
                        name={"name"}
                        value={data.name ?? ''}
                        placeholder={"Name"}
                    />
                    <Form.Input
                        onChange={onChange}
                        name={"email"}
                        value={data.email ?? ''}
                        placeholder={"Email"}
                    />
                </>
            )}
        />
    )
}

export default UserForm