import React from "react";

import "./ProductDetail.css";

function ProductDetail(props) {
    return (
        <div>
            <div className="productDetail_left"></div>
            <div className="productDetail_right">
                <div className="productDetail_right_title">
                    Điện Thoại iPhone 12 Pro 128GB - Hàng Chính Hãng
                </div>
                <div className="productDetail_right_price">25.990.000 ₫</div>
                <div className="productDetail_right_color"></div>
                <div className="productDetail_right_memory"></div>
            </div>
            {/* <div className="productDetail_image">
            
        </div> */}
        </div>
    );
}

export default ProductDetail;
