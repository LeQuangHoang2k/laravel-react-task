import React, { useEffect, useState } from "react";
import { Button, Form, Modal, Spinner } from "react-bootstrap";

import "./RegisterModal.css";

function RegisterModal(props) {
    const { show, handleClose } = props;

    const [email, setEmail] = useState("");

    const [phone, setPhone] = useState("");

    const [password, setPassword] = useState("");

    const [confirmPassword, setConfirmPassword] = useState("");

    var formData = {
        email,
        phone,
        password,
        confirmPassword,
    };

    const registerAccount = async () => {
        alert("đợi tí");

        //input

        if (!checkRequest()) return;

        console.log(checkRequest());

        //db

        const res = await axios.post("/api/login", formData);

        const { data } = await res;

        console.log("php: ", res);

        //res
        // handleClose();
        // window.location.reload();
    };

    const checkRequest = () => {
        console.log(formData);

        if (!email || email.length < 5) return alert("Email not valid");

        if (!phone || phone.length < 9) return alert("Phone not valid");

        if (!password || password.length < 5)
            return alert("Password not valid");

        if (password !== confirmPassword) return alert("Password not confirm");

        return true;
    };

    return (
        <>
            <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Register</Modal.Title>
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

                        <Form.Group controlId="formBasicPhone">
                            <Form.Label>Phone number</Form.Label>
                            <Form.Control
                                type="phone"
                                placeholder="Enter phone number"
                                onChange={(e) => setPhone(e.target.value)}
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

                        <Form.Group controlId="formBasicConfirmPassword">
                            <Form.Label>Confirm Password</Form.Label>
                            <Form.Control
                                type="password"
                                placeholder="Confirm Password"
                                onChange={(e) =>
                                    setConfirmPassword(e.target.value)
                                }
                            />
                        </Form.Group>
                    </Form>
                </Modal.Body>

                <Modal.Footer>
                    <Button variant="secondary" onClick={handleClose}>
                        Close
                    </Button>
                    <Button variant="primary" onClick={registerAccount}>
                        <i className="fa fa-refresh fa-spin"></i>
                        Save Changes
                    </Button>
                </Modal.Footer>
            </Modal>
        </>
    );
}

export default RegisterModal;
