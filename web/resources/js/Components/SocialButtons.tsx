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

    return (
        <div style={{paddingTop: "25px"}} className="flex flex-row justify-center">
            <button style={buttonStyles}>
                <img src={Google} style={imageStyles} alt="Google" />
            </button>

            <button style={buttonStyles}>
                <img src={Facebook} style={imageStyles} alt="Facebook" />
            </button>

            <button style={buttonStyles}>
                <img src={Apple} style={imageStyles} alt="Apple" />
            </button>
        </div>
    );
}
