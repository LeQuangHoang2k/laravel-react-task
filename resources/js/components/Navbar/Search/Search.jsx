import React, { useState } from "react";
import "./Search.css";

import SearchIcon from "../../../../images/SearchIcon.png";

function Search(props) {
    const [name, setName] = useState("");

    const search = async (e) => {
        await e.preventDefault();

        alert("đợi tí");

        //input

        if (!checkRequest()) return;

        console.log(checkRequest());

        //db

        // const res = await axios.post("/api/search-product", formData);

        // const { data } = await res;

        // alert("Notification : " + data.message);

        // console.log("php: ", data);

        //main

        //res

        // if(!data || !data.product) return;

        // localStorage.setItem("product",JSON.stringify(data.product));
        // let a= localStorage.getItem("product");

        // a = JSON.parse(a)

        // console.log(a);

        console.log("name: " + name);
        window.location.href=`/?search=${name}`;
    };

    const checkRequest = () => {

        if (!name || name.length < 1) return alert("Your text is not valid");

        return true;
    };

    return (
        <form className="search_wrapper" onSubmit={search}>
            <input
                className="search_input"
                placeholder="Search for the desired product"
                onChange={(e) => setName(e.target.value)}
            />
            <button type="submit" className="search_button">
                <img src={SearchIcon} className="search_icon" alt="Image" />
                Search
            </button>
        </form>
    );
}

export default Search;
