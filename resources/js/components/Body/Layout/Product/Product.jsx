import React from "react";

import "./Product.css";

function Product(props) {
    return (
        <div>
            {[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15].map((item) => {
                return (
                    <a key={item} href="abc" className="product_wrapper">
                        <div className="product_content">
                            <img
                                src="https://salt.tikicdn.com/cache/280x280/ts/product/9a/2e/ef/b1ca821448463399a638394f9bc8a8b3.jpg"
                                className="product_image"
                                alt="Image"
                            />

                            <span className="product_title">
                                Tai Nghe Bluetooth True Wireless Samsung Galaxy
                                Buds + Plus - Hàng chính hãng
                            </span>

                            <div>
                                <span className="product_star">
                                    Đánh giá : 5 sao |
                                </span>{" "}
                                <span className="product_sold">
                                    Đã bán : 50
                                </span>
                            </div>

                            <div>
                                <span className="product_price">
                                    1.390.000 đ
                                </span>
                                &nbsp;
                                <span className="product_discount">-69%</span>
                            </div>
                        </div>
                    </a>
                );
            })}
            {/* <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a>
            <a href="abc" className="product_wrapper">
                item1
            </a> */}
        </div>
    );
}

export default Product;
