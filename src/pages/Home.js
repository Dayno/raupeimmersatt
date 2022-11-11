import React from "react";
import { Link } from "react-router-dom";

const Home = () => {

  // Hier wird eine Menge JavaScript stehen !

  return (
    <div className="h-screen bg-primary flex justify-center items-center">
      <div className="h-48 w-96 bg-default shadow-lg rounded-lg flex flex-col gap-6 justify-center items-center">
        <h1 className="font-medium text-lg">
          Das ist die Homepage
        </h1>
        <Link to="/about" className="text-secondary font-medium">Zur Aboutpage</Link>
      </div>
    </div>
  );
};

export default Home;
