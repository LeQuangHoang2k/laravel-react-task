import React from "react";

import Account from "./Account/Account";
import Cart from "./Cart/Cart";
import "./Navbar.css";

function Navbar(props) {
    return (
        <nav className="navbar_wrapper">
            <form
                className="element"
                style={{
                    width: "720px",
                    height: "100px",
                    backgroundColor: "blue",
                }}
            ></form>
            <Account />
            <Cart />
        </nav>
    );
}

export default Navbar;
