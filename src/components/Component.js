import React, {useState} from "react";

const Component = () => {

  // Zählfunktion
  let [count, setCount] = useState(0);
  let countFunction = () => {
    setCount(count + 1);
  }

  return (
    <div className="h-screen bg-primary flex justify-center items-center">
      <div className="h-48 w-96 bg-default shadow-lg rounded-lg flex flex-col gap-2 justify-center items-center">
        <h1 className="font-medium text-lg text-center">
          Das könnte eine wiederverwendbare Componente sein.
        </h1>   
        <button onClick={countFunction} className="p-2 rounded-lg shadow-lg text-default text-xs font-medium bg-primary hover:bg-black">Click ME!</button>
        <p>Zahl: {count}</p>
      </div>
    </div>
  );
};

export default Component;
