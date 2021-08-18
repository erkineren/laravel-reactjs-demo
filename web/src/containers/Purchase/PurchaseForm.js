import {Form} from "semantic-ui-react";
import EntityForm from "../../components/EntityUI/EntityForm";
import {useContext} from "react";
import {AppContext} from "../../context";

function PurchaseForm() {
    const ctx = useContext(AppContext)

    return (
        <EntityForm
            route={'purchases'}
            render={(data, onChange) => (
                <>
                    <Form.Input
                        onChange={onChange}
                        name={"paid_at"}
                        value={data.paid_at ?? ''}
                        placeholder={"Paid At"}
                    />
                </>
            )}
        />
    )
}

export default PurchaseForm