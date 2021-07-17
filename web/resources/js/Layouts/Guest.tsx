import React from 'react';
import {BackButton} from '@/Components/BackButton';
import CSS from "csstype"

interface Props {
    children: React.ReactNode;
    previousRoute?: string | undefined;
}

export default function Guest({ children, previousRoute }: Props) {
    const backgroundStyle: CSS.Properties = {
        background: "linear-gradient(0deg, #3f4e9b40, white)"
    }

    return (
        <div className="pt-6 sm:pt-0" style={backgroundStyle}>
            <BackButton previousRoute={previousRoute} />
            <div className="min-h-screen flex flex-col sm:justify-center items-center ">
                <div className="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                    {children}
                </div>
            </div>
        </div>
    );
}
