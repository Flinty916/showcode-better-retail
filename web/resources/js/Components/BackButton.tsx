import React, {FC} from 'react';
import CSS from "csstype";
// @ts-ignore
import backArrow from "../../images/arrow_back.png";
import route from "ziggy-js";
import {InertiaLink} from "@inertiajs/inertia-react";

interface Props {
    previousRoute?: string | undefined;
}

export const BackButton: FC<Props> = (props) => {
    const backArrowStyles: CSS.Properties = {
        position: 'absolute',
        width: '24px',
        height: '24px',
        left: '35px',
        top: '45px'
    };

    if (props.previousRoute !== undefined)
        return  (<InertiaLink href={route(props.previousRoute)}><img src={backArrow} style={backArrowStyles} alt="Back arrow"  /></InertiaLink>);

    return <></>;
}
