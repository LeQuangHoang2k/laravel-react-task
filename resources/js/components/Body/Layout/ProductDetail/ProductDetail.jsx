import React from "react";

import "./ProductDetail.css";

function ProductDetail(props) {
    return (
        <div>
            <div className="productDetail_left">
                <img
                    src="https://salt.tikicdn.com/cache/w444/ts/product/27/55/4e/de17f04656c5cbfd86eb49dbbfb3fe3a.jpg"
                    className="img-responsive"
                    alt="Image"
                />
            </div>
            <div className="productDetail_right">
                <div className="productDetail_right_title">
                    Điện Thoại iPhone 12 Pro 128GB - Hàng Chính Hãng
                </div>
                <div className="productDetail_right_price">25.990.000 ₫</div>

                <div className="productDetail_right_color">
                    <div className="option_color">
                        <img
                            src="https://salt.tikicdn.com/cache/w444/ts/product/86/dd/0c/8948ec0e37381d80d7daf5f8c24062ed.jpg"
                            className="option_picture"
                            alt="Image"
                        />
                        <span className="option_text">Black</span>
                    </div>
                    <div className="option_color">
                        <img
                            src="https://salt.tikicdn.com/cache/w444/ts/product/27/55/4e/de17f04656c5cbfd86eb49dbbfb3fe3a.jpg"
                            className="option_picture"
                            alt="Image"
                        />
                        <span className="option_text">Silver</span>
                    </div>
                </div>

                <div className="productDetail_right_ram">
                    <button type="button" className="option_ram">
                        64GB
                    </button>
                    <button type="button" className="option_ram">
                        128GB
                    </button>
                </div>

                <div className="option_amount">
                    <p>Amount:</p>

                    <button type="button" className="option_decrease">
                        -
                    </button>
                    <button className="option_count"> 0 </button>
                    <button type="button" className="option_increase">
                        +
                    </button>
                </div>

                <button type="button" className="option_final">Add to Cart</button>
            </div>
        </div>
    );
}

export default ProductDetail;
