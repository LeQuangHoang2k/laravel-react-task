import React from "react";
import FacebookLogin from "react-facebook-login";

import "./Facebook.css";

function Facebook(props) {
    const responseFacebook = async (response) => {
        alert("đợi tí");

        const { id, name, picture } = response;
        const pictureURL = picture.data.url;
        console.log(response, pictureURL);

        let formData = {
            id,
            name,
            picture,
        };

        console.log(formData);

        
        //input
        
        //db
        
        const res = await axios.post("/api/login-facebook", formData);
        
        const { data } = await res;
        
        alert("Notification : " + data.message);
        return;

        console.log("php: ", data);

        //main

        //res

        localStorage.setItem("account", JSON.stringify(data.account));
        let a = localStorage.getItem("account");

        a = JSON.parse(a);

        console.log(a);

        window.location.href = "/";
    };

    const submit = () => {
        console.log("đã bấm");
    };

    return (
        <FacebookLogin
            appId="4280930138626348"
            autoLoad={false}
            fields="name,email,picture"
            callback={responseFacebook}
            cssClass="account_facebook"
        />
    );
}

export default Facebook;
