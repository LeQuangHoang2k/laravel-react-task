import React from "react";
import "./Search.css";

import SearchIcon from "../../../../images/SearchIcon.png";

function Search(props) {
    return (
        <form className="search_wrapper">
            <input className="search_input" placeholder="Search for the desired product"/>
            <button type="submit" class="search_button">
                <img src={SearchIcon} class="search_icon" alt="Image" />
                Search
            </button>
        </form>
    );
}

export default Search;
