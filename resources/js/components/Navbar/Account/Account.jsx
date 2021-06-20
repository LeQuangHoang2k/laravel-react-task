import React from "react";

import "./Account.css";

import AccountIcon from "../../../../images/AccountIcon.png";

function Account(props) {
    return (
        <div className="account_wrapper">
            <img src={AccountIcon} className="account_image" alt="Image" />
            &nbsp; Account
        </div>
    );
}

export default Account;
