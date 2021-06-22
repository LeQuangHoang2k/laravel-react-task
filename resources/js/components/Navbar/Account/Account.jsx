import React from "react";
import Dropdown from "./Dropdown/Dropdown";

import "./Account.css";

import AccountIcon from "../../../../images/AccountIcon.png";
import AccountArrow from "../../../../images/AccountArrow.png";

function Account(props) {
    return (
        <div className="account_wrapper">
            <div className="account_content">
                <img src={AccountIcon} className="account_image" alt="Image" />
                <div className="account_name">
                    <span className="account_title">Lê Quang Hoàng</span>
                </div>
                <img src={AccountArrow} className="account_arrow" alt="Image" />

                {/* <span className="account_name">Account</span> */}
                {/* <Dropdown /> */}
            </div>
        </div>
    );
}

export default Account;
