import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';
import route from 'ziggy-js';
import CSS from "csstype";
// @ts-ignore
import Logo from "../../images/shopping_cart.png";
import "../../css/fonts.css";
import {BackButton} from "@/Components/BackButton";

export default function Welcome(props: any) {
    const backgroundStyle: CSS.Properties = {
        width: "100%",
        height: "100%"
    }

    const regStyle: CSS.Properties = {
        paddingTop: "10px",
        paddingBottom: "10px",
        background: "#7286F2",
        borderRadius: "15px",
        width: "100%",
        fontFamily: "Inter",
        fontStyle: "normal",
        fontWeight: 600,
        fontSize: "23px",
        lineHeight: "29px",
        color: "#FFFFFF"
    }

    const loginStyle: CSS.Properties = {
        paddingTop: "10px",
        paddingBottom: "10px",
        background: "#DFDFDF",
        borderRadius: "15px",
        width: "100%",
        fontFamily: "Inter",
        fontStyle: "normal",
        fontWeight: 600,
        fontSize: "23px",
        lineHeight: "29px",
        color: "#646464"
    }

    const spacer: CSS.Properties = {
        paddingTop: "20px"
    }

    const logoContainer: CSS.Properties = {
        paddingBottom: "50px",
        display: "flex",
        flexDirection: "row",
        justifyContent: "center",
        alignItems: "center"
    }

    const logoStyle: CSS.Properties = {
        position: "static",
        flex: "none",
        order: 0,
        flexGrow: 0
    }

    const titleStyle: CSS.Properties = {
        position: "static",
        fontFamily: "Inter",
        fontStyle: "normal",
        fontWeight: "bold",
        fontSize: "40px",
        lineHeight: "50px",
        display: "flex",
        alignItems: "center",
        letterSpacing: "-0.04em",
        color: "#7286F2",
        flex: "none",
        order: 1,
        flexGrow: 0
    }

    return (
        <div style={backgroundStyle}>
            <div className="min-h-screen flex flex-wrap content-center">
                <div className="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                    {props.auth.user ? (
                        <InertiaLink href="/dashboard" className="text-sm text-gray-700 underline">
                            Dashboard
                        </InertiaLink>
                    ) : (
                        <>
                            <div style={logoContainer}>
                                <img src={Logo} style={logoStyle}  alt="Logo"/>
                                <p style={titleStyle}>ProductHunt</p>
                            </div>
                            <button style={regStyle}><a href={route("register")}>Create Account</a></button>
                            <div style={spacer}>
                                <button style={loginStyle}><a href={route("login")}>Log in</a></button>
                            </div>
                        </>
                    )}
                </div>
            </div>
        </div>
    );
}
