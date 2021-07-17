import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import ShoppingList from "@/Components/ShoppingList";
import Journey from "@/Components/Journey";

export default function Search(props: React.PropsWithChildren<any>) {
    return (
        <Authenticated
            auth={props.auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Search
                </h2>
            }
        >
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {/* <ShoppingList /> */}
                    <Journey />
                </div>
            </div>
        </Authenticated>
    );
}
