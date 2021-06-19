import React from 'react';

import './Cart.css'
import CartIcon from '../../../../images/CartIcon.png';

function Cart(props) {
    return (
        <div className="cart_wrapper">
            <img src={CartIcon} className="cart_image" alt="Image"/> &nbsp; cart
        </div>
    );
}

export default Cart;