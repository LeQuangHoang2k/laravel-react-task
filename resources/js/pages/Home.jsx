import React from 'react';

import Navbar from '../components/Navbar/Navbar';
import Body from '../components/Body/Body';

Home.propTypes = {
    
};

function Home(props) {
    return (
        <div>
            <Navbar/>   
            <Body />
        </div>
    );
}

export default Home;