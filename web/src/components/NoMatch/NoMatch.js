import {useLocation} from "react-router-dom";

function NoMatch() {
    let location = useLocation();

    return (
        <div style={{
            width: "100%",
            height: "100%",
            display: "flex",
            justifyContent: "center",
            alignItems: "center"
        }}>
            <h3>
                No match for <code>{location.pathname}</code>
            </h3>
        </div>
    );
}

export default NoMatch;