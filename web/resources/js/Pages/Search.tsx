import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import ShoppingList from "@/Components/ShoppingList";
import Journey from "@/Components/Journey";

export default function Search(props: React.PropsWithChildren<any>) {
    return (
        <Authenticated auth={props.auth}>
            <div className="bg-gradient-to-r from-indigo-400 to-indigo-500 h-screen">
                <header className="grid gap-2 p-8">
                    <h1 className="font-semibold text-white text-3xl">
                        👋 Hi there!
                    </h1>

                    <label
                        className="text-white font-semibold text-lg"
                        htmlFor="items"
                    >
                        Search for items
                    </label>
                    <input className="rounded-lg py-2 shadow-lg" name="items" />
                </header>

                <main className="bg-white rounded-2xl h-full">
                </main>
            </div>
        </Authenticated>
    );
}
