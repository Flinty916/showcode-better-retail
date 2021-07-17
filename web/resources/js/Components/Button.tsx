import React from 'react';

interface Props {
    children: React.ReactNode;
    type?: "submit" | "button" | "reset" | undefined;
    processing: boolean;
    className?: string;
    style?: any;
}

const Button: React.FC<Props> = ({ type = 'submit', className = '', processing, children, style}) => {
    return (
        <button
            style={style}
            type={type}
            className={className}
            disabled={processing}
        >
            {children}
        </button>
    );
}

export default Button;
