import React, { useEffect, useState } from "react";
import Dropdown from "./Dropdown/Dropdown";

import "./Account.css";

import AccountIcon from "../../../../images/AccountIcon.png";
import AccountArrow from "../../../../images/AccountArrow.png";
import DropdownUser from "./DropdownUser/DropdownUser";

function Account(props) {
    const [account, setAccount] = useState(
        JSON.parse(localStorage.getItem("account")) || null
    );
    
    const [accountImage, setAccountImage] = useState(AccountIcon);
    const [accountTitle, setAccountTitle] = useState("My Account");

    const [dropdownComponent, setDropdownComponent] = useState(<Dropdown />);

    useEffect(() => {
        updateAccountUI();
    }, []);

    const updateAccountUI = () => {
        if (!account)
            return alert(
                "Vui lòng đăng nhập để nhận ưu đãi khi săn sale Tiki 7/7 nhé !"
            );

        if (account.AccountPictureURL !== "")
            setAccountImage(account.AccountPictureURL);

        if (account.AccountName !== "") setAccountTitle(account.AccountName);
        else {
            setAccountTitle(account.AccountEmail);
        }

        setDropdownComponent(<DropdownUser />)

    };



    return (
        <div className="account_wrapper">
            <div className="account_content">
                <img src={accountImage} className="account_image" alt="Image" />
                <div className="account_name">
                    <span className="account_title">{accountTitle}</span>
                </div>
                <img src={AccountArrow} className="account_arrow" alt="Image" />

                {dropdownComponent}
                
            </div>
        </div>
    );
}

export default Account;
