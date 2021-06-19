import React from "react";

import Cart from "./Cart/Cart"
import "./Navbar.css";

function Navbar(props) {
    return (
        <nav className="navbar_wrapper">
            <form className="element" style={{
                    width: "720px",
                    height: "100px",
                    backgroundColor: "blue",
                }}>
                
            </form>
            <div
                className="element"
                style={{
                    width: "180px",
                    height: "100px",
                    backgroundColor: "white",
                }}
            >
                aaa
            </div>
          <Cart />
        </nav>
    );
}

export default Navbar;
