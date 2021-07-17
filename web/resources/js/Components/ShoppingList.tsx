import React, { useState } from "react";

const initialItems = [
    { id: 1, order: 1, name: "Chicken Breasts" },
    { id: 2, order: 2, name: "Cheddar Cheese" },
    { id: 3, order: 3, name: "Canned Tomatoes" },
];

const ShoppingList: React.FC = () => {
    const [items, setItems] = useState(initialItems);

    return (
        <div
            className="bg-white px-4 py-8 rounded-xl shadow-xl flex flex-col justify-between mx-4 items-center gap-4"
            style={{ height: "572px" }}
        >
            <div className="w-full grid place-items-center gap-4">
                <h1 className="text-2xl font-semibold pb-4 border-b border-gray-300 w-full text-center">
                    Shopping List
                </h1>
                <ul className="grid gap-2">
                    {items.map((item) => (
                        <li key={item.id} className="w-full flex gap-2">
                            <div className="rounded-full bg-red-400 font-semibold text-white w-6 text-center text-sm">
                                {item.order}
                            </div>
                            <p>{item.name}</p>
                        </li>
                    ))}
                </ul>
            </div>
            <button className="bg-gradient-to-b from-green-400 to-green-500 rounded-xl text-white py-3 w-full">
                + Add More Items
            </button>
        </div>
    );
};

export default ShoppingList;
