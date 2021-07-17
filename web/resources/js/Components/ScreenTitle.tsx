import React, {FC} from 'react';
import CSS from "csstype";
import "../../css/fonts.css";

interface Props {
    titleName: string;
}

export const ScreenTitle: FC<Props> = (props) => {
    const titleStyle: CSS.Properties = {
        fontFamily: "Inter",
        fontStyle: "normal",
        fontWeight: 600,
        fontSize: "35px",
        alignItems: "center",
        textAlign: "center",
        color: "#3F4E9B"
    };

    return (<p style={titleStyle}>{props.titleName}</p>);
}
