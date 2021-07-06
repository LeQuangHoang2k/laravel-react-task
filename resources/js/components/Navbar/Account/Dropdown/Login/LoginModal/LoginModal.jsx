import React, { useState } from "react";
import { Button, Form, Modal } from "react-bootstrap";

import "./LoginModal.css";

function LoginModal(props) {
    const { show, handleClose } = props;

    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    var formData = {
        email,
        password,
    };

    const login = async () => {
        alert("đợi tí");

        //input

        if (!checkRequest()) return;

        console.log(checkRequest());

        //db

        const res = await axios.post("/api/login", formData);

        const { data } = await res;

        alert("Notification : " + data.message);
        
        console.log("php: ", data);

        //main

        //res

        localStorage.setItem("account",JSON.stringify(data.account));
        let a= localStorage.getItem("account");

        a = JSON.parse(a)

        console.log(a);
        
        window.location.href="/";
    };

    const checkRequest = () => {
        console.log(formData);

        if (!email || email.length < 5) return alert("Email not valid");

        if (!password || password.length < 5)
            return alert("Password not valid");

        return true;
    };

    return (
        <>
            <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Login</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form>
                        <Form.Group controlId="formBasicEmail">
                            <Form.Label>Email address</Form.Label>
                            <Form.Control
                                type="email"
                                placeholder="Enter email"
                                onChange={(e) => setEmail(e.target.value)}
                            />
                        </Form.Group>

                        <Form.Group controlId="formBasicPassword">
                            <Form.Label>Password</Form.Label>
                            <Form.Control
                                type="password"
                                placeholder="Password"
                                onChange={(e) => setPassword(e.target.value)}
                            />
                        </Form.Group>
                    </Form>
                </Modal.Body>

                <Modal.Footer>
                    <Button variant="secondary" onClick={handleClose}>
                        Close
                    </Button>
                    <Button variant="primary" onClick={login}>
                        Save Changes
                    </Button>
                </Modal.Footer>
            </Modal>
        </>
    );
}

export default LoginModal;
