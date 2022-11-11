import React from "react";
import { Link } from "react-router-dom";
import Component from "../components/Component";

const Home = () => {
  return (
    <div className="h-screen bg-primary flex justify-center items-center gap-10">
      <div className="h-48 w-96 bg-default shadow-lg rounded-lg flex flex-col gap-6 justify-center items-center">
        <h1 className="font-medium text-lg">
          Das ist die Aboutpage
        </h1>
        <Link to="/" className="text-secondary font-medium">Zurück zur Homepage</Link>
      </div>
      <Component />
    </div>
  );
};

export default Home;
