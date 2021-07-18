import React, {FC} from "react";
import CSS from "csstype";
// @ts-ignore
import Google from "../../images/Google.png";
// @ts-ignore
import Facebook from "../../images/Facebook.png";
// @ts-ignore
import Apple from "../../images/Apple.png";

export const SocialButtons: FC = () => {
    const buttonStyles: CSS.Properties = {
        background: "#FFFFFF",
        boxShadow: "0px 5px 20px rgba(0, 0, 0, 0.15)",
        borderRadius: "15px",
        width: "65px",
        height: "65px",
        marginLeft: "10px",
        marginRight: "10px"
    };

    const imageStyles: CSS.Properties = {
        marginLeft: "auto",
        marginRight: "auto"
    }

    const fb = () => {
        location.href = '/login/facebook'
    }

    return (
        <div style={{paddingTop: "25px"}} className="flex flex-row justify-center">
            <button style={buttonStyles}>
                <a href="/login/google/callback">
                    <img src={Google} style={imageStyles} alt="Google"/>
                </a>
            </button>

            <button style={buttonStyles}>
                <a href="/login/facebook/callback">
                    <img src={Facebook} style={imageStyles} alt="Facebook"/>
                </a>
            </button>

            <button style={buttonStyles}>
                <a href="/login/apple/callback">
                    <img src={Apple} style={imageStyles} alt="Apple"/>
                </a>
            </button>
        </div>
    );
}
