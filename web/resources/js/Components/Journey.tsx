import React from "react";

const Journey: React.FC = () => {
    const map = Array(10).fill(Array(10).fill("O"));

    return (
        <>
            <img src="images/map.png" alt="map" />
            {map.map((column, x) => (
                <div className="flex">
                    {column.map((grid: any, y: any) => (
                        <div>{grid}</div>
                    ))}
                </div>
            ))}
        </>
    );
};

export default Journey;
