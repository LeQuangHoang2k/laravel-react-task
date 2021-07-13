import React, { useEffect, useState } from "react";
import queryString from "query-string";

import "./ProductDetail.css";
import Alert from "../../../../features/Alert";

function ProductDetail(props) {
    const [activeID, setActiveID] = useState(0);
    const [product, setProduct] = useState([]);
    const [options, setOptions] = useState([]);
    const [cart, setCart] = useState(
        JSON.parse(localStorage.getItem("cart")) || []
    );

    const [optionID, setOptionID] = useState(0);
    const [price, setPrice] = useState(0);
    const [count, setCount] = useState(0);

    const { product_id } = queryString.parse(window.location.search);

    var formData = {
        productID: product.ProductID,
        price: price,
        count,
        optionID,
    };

    useEffect(() => {
        fetchProduct();

        console.log("cart first: ", cart);

        return () => {
            setProduct([]);
            setOptions([]);
            setCart([]);

            setPrice(0);
            setCount(0);
            setOptionID(0);

            formData = {};
        };
    }, []);

    const fetchProduct = async () => {
        var res = null;

        if (product_id && product_id !== "") {
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

        setProduct(data.product);
        setOptions(data.option);
        setActiveID(data.option[0].OptionID);

        setPrice(data.product.PriceDefault);
        setOptionID(data.option[0].OptionID);
    };

    const updateProduct = (item) => {
        setPrice(item.OptionPrice);
        setOptionID(item.OptionID);
        setActiveID(item.OptionID);
    };

    const countIncrease = (item) => {
        setCount(count + 1);
    };

    const countDecrease = (item) => {
        if (count === 0) return Alert({ warning: "Can't decrease" });

        setCount(count - 1);
    };

    const addCart = () => {
        if (price <= 0)
            return Alert({
                warning: "Can't add to cart because price isn't valid.",
            });

        if (count <= 0)
            return Alert({
                warning: "Can't add to cart because count isn't valid.",
            });

        if (optionID <= 0)
            return Alert({
                warning: "Can't add to cart because option name isn't valid.",
            });

        saveCart();
    };

    const saveCart = () => {
        Alert({ message: "save thành công" });

        console.log("formData: ", formData);
        console.log("cart", cart);

        cart.push({ product: formData });
        localStorage.setItem("cart", JSON.stringify(cart));

        console.log("cart", cart);
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
                    {product.ProductName}
                </div>
                <div className="productDetail_right_price">
                    {parseInt(price).toLocaleString("it-IT", {
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

                <div className="productDetail_right_ram" id="option_wrapper ">
                    {options.map((item) => {
                        return (
                            <button
                                key={item.OptionID}
                                type="button"
                                className={
                                    activeID === item.OptionID
                                        ? "option_ram active"
                                        : "option_ram"
                                }
                                onClick={() => updateProduct(item)}
                            >
                                {item.OptionValue}
                            </button>
                        );
                    })}
                </div>

                <div className="option_amount">
                    <p>Amount:</p>

                    <button
                        type="button"
                        className="option_decrease"
                        onClick={countDecrease}
                    >
                        -
                    </button>
                    <button className="option_count"> {count} </button>
                    <button
                        type="button"
                        className="option_increase"
                        onClick={countIncrease}
                    >
                        +
                    </button>
                </div>

                <button
                    type="button"
                    className="option_final"
                    onClick={addCart}
                >
                    Add to Cart
                </button>
            </div>
        </div>
    );
}

export default ProductDetail;
