import React from "react";
import Dropdown from "./Dropdown/Dropdown";

import "./Account.css";

import AccountIcon from "../../../../images/AccountIcon.png";

function Account(props) {
    return (
        <div className="account_wrapper">
            <div className="account_content">
                <img src={AccountIcon} className="account_image" alt="Image" />
                &nbsp;
                <span className="account_name">Account</span>
                <Dropdown />
            </div>
        </div>
    );
}

export default Account;
