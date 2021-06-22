import React from "react";
import { GoogleLogin } from "react-google-login";

import "./Google.css";

function Google(props) {
    const google = (resGG) => {
        const { googleId, tokenId } = resGG;
        console.log(resGG);
    };
    const googleFailure = (res) => {};

    return (
        <GoogleLogin
            clientId="70419162145-mmja2ctoulck83l2rnvod1cplispathp.apps.googleusercontent.com"
            onSuccess={google}
            onFailure={googleFailure}
            render={(props) => {
                return (
                    <button
                        type="button"
                        className="fa fa-google account_google"
                        onClick={props.onClick}
                    >
                        Login with Google
                    </button>
                );
            }}
        />
        // <div className="account_google">Google</div>
    );
}

export default Google;
