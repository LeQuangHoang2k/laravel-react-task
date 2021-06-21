import React from "react";

import Login from "./Login/Login";
import Register from "./Register/Register";

import "./Dropdown.css";

function Dropdown(props) {
    return (
        <div className="account_dropdown">
            {/* Đăng nhập */}
            <Login />
            {/* Đăng kí */}
            <Register />
            {/* Facebook */}
            {/* Google */}
        </div>
    );
}

export default Dropdown;
