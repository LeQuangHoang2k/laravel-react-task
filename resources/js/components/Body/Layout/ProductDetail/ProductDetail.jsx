import React, { useEffect, useState } from "react";
import queryString from "query-string";

import "./ProductDetail.css";

function ProductDetail(props) {
    const [products, setProducts] = useState([]);

    const { product_id } = queryString.parse(window.location.search);

    useEffect(() => {
        fetchProduct();

        return () => {
            setProducts([]);
        };
    }, []);

    const fetchProduct = async () => {
        var res = null;

        // alert("1");
        if (product_id && product_id !== "") {
            // alert("2");
            console.log("product_id là: ", product_id);

            res = await axios.post("/api/search-product-detail", {
                product_id,
            });
        } else {
            res = await axios.post("/api/show-product");
        }

        const { data } = await res;
        // return;

        console.log("php: ", data);

        console.log(data);

        setProducts(data.product);
    };

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
                    {/* Điện Thoại iPhone 12 Pro 128GB - Hàng Chính Hãng */}
                    {products.ProductName}
                </div>
                <div className="productDetail_right_price">
                    {parseInt(products.PriceDefault).toLocaleString("it-IT", {
                        style: "currency",
                        currency: "VND",
                    })}
                </div>

                {/* <div className="productDetail_right_color">
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
                </div> */}

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

                <button type="button" className="option_final">
                    Add to Cart
                </button>
            </div>
        </div>
    );
}

export default ProductDetail;
