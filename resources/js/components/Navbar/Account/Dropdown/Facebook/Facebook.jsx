import React from "react";
import FacebookLogin from "react-facebook-login";

import "./Facebook.css";

function Facebook(props) {
    const responseFacebook = (response) => {
        console.log(response);
        console.log("đã bấm");

    };

    const submit = () => {
        console.log("đã bấm");
    };

    return (
        <FacebookLogin
            appId="863062867922730"
            autoLoad={false}
            fields="name,email,picture"
            callback={responseFacebook}
            cssClass="account_facebook"
        />
    );
}

export default Facebook;
