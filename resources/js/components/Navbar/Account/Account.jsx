import React from "react";

import "./Account.css";

import AccountIcon from "../../../../images/AccountIcon.png";

function Account(props) {
    return (
        <div className="account_wrapper">
            <img src={AccountIcon} className="account_image" alt="Image" />
            <div className="element" style={{width:"10px",height:"50px"}}>
                <p>aa</p>
                <p>aa</p>
            </div>
        </div>
    );
}

export default Account;
