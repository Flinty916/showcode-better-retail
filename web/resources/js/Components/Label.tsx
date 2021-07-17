import React from 'react';
import CSS from "csstype";

interface Props {
    forInput: string;
    value: string;
    className?: string;
}

const Label: React.FC<Props> = ({ forInput, value, className, children }) => {
    const labelStyling: CSS.Properties = {
        fontFamily: "Inter",
        fontStyle: "normal",
        fontWeight: 600,
        fontSize: "17px",
        lineHeight: "24px",
        color: "#7286F2"
    };

    return (
        <label style={labelStyling} htmlFor={forInput} className={`block font-medium text-sm text-gray-700 ` + className}>
            {value ? value : { children }}
        </label>
    );
}

export default Label;
