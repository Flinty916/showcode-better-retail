import React, {FC} from "react";
import CSS from "csstype";
import Label from "@/Components/Label";
import Input from "@/Components/Input";
import {InertiaLink} from "@inertiajs/inertia-react";
import route from "ziggy-js";
import Button from "@/Components/Button";
import "../../css/fonts.css";

interface Props {
    data: any,
    onHandleChange: any,
    canResetPassword: boolean,
    processing: any,
    buttonText: string
}

export const EmailPasswordForm: FC<Props> = (props) => {
    const forgotStyle: CSS.Properties = {
        paddingTop: "10px",
        fontFamily: "Inter",
        fontStyle: "normal",
        fontWeight: "normal",
        fontSize: "17px",
        lineHeight: "25px",
        color: "#A7A7A7",
        textDecoration: "none"
    }

    const buttonStyle: CSS.Properties = {
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

    const spacing: CSS.Properties = {
        paddingTop: "25px"
    }

    return (
        <div>
            <div>
                <Label forInput="email" value="Email Address"/>

                <Input
                    type="text"
                    name="email"
                    placeholder={"name@mail.com"}
                    value={props.data.email}
                    className="mt-1 block w-full"
                    autoComplete="username"
                    isFocused={true}
                    handleChange={props.onHandleChange}
                />
            </div>

            <div className="mt-4">
                <Label forInput="password" value="Password"/>

                <Input
                    type="password"
                    name="password"
                    value={props.data.password}
                    placeholder={"***************"}
                    className="mt-1 block w-full"
                    autoComplete="current-password"
                    handleChange={props.onHandleChange}
                />

                <div className="flex justify-end">
                    {props.canResetPassword && (
                        <InertiaLink
                            style={forgotStyle}
                            href={route('password.request')}
                            className="underline text-sm text-gray-600 hover:text-gray-900"
                        >
                            Forgot password?
                        </InertiaLink>
                    )}
                </div>
            </div>

            <div className="flex items-center justify-end mt-4" style={spacing}>
                <Button style={buttonStyle} processing={props.processing}>
                    {props.buttonText}
                </Button>
            </div>
        </div>
    );
}
