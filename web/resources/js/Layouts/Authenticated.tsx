import ApplicationLogo from "../Components/ApplicationLogo";
import Dropdown from "../Components/Dropdown";
import NavLink from "../Components/NavLink";
import React, { useState } from "react";
import ResponsiveNavLink from "../Components/ResponsiveNavLink";
import { InertiaLink } from "@inertiajs/inertia-react";
import route from "ziggy-js";

interface Props {
    auth: any;
    header?: React.ReactNode;
    children: React.ReactNode;
}

export default function Authenticated({
    auth,
    header = null,
    children,
}: Props) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] =
        useState(false);

    return (
        <div className="min-h-screen bg-gray-100">
            {header && (
                <header className="bg-white shadow">
                    <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {header}
                    </div>
                </header>
            )}

            <main>{children}</main>

            <nav className="flex justify-between w-full bg-white fixed bottom-0 border-t border-gray-400">
                <NavLink
                    href={route("search")}
                    active={route().current("search")}
                >
                    <img
                        className="m-2"
                        src="/images/search.png"
                        alt="search"
                        width="31"
                        height="31"
                    />
                </NavLink>
                <NavLink
                    href={route("dashboard")}
                    active={route().current("dashboard")}
                >
                    <img
                        className="m-2"
                        src="/images/stars.png"
                        alt="stars"
                        width="31"
                        height="31"
                    />
                </NavLink>
                <NavLink
                    href={route("profile")}
                    active={route().current("profile")}
                >
                    <img
                        className="m-2"
                        src="/images/person.png"
                        alt="person"
                        width="31"
                        height="31"
                    />
                </NavLink>
            </nav>
        </div>
    );
}
