import React from 'react';

import Product from './Product/Product';

import "./Layout.css"

function Layout(props) {
    return (
        <div className="layout_wrapper">
            <Product/>
        </div>
    );
}

export default Layout;