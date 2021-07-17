import React from "react";
const items = [{ id: 0, order: 1, name: "Chicken Breasts" }];

const ShoppingList: React.FC = () => {
    return (
        <div className="bg-white p-4 rounded shadow grid place-items-center">
            <h1>Shopping List</h1>
            <ul>
                {items.map((item) => (
                    <li>
                        {item.order}: {item.name}
                    </li>
                ))}
            </ul>
            <button className="bg-green-500 rounded-full font-bold text-white py-2 px-3">
                Add More Items
            </button>
        </div>
    );
};

export default ShoppingList;
