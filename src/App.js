import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import ScrollToTop from "./utils/ScrollToTop";

import Home from "./pages/Home";
import About from "./pages/About";

function App() {
  return (
    <div className="App">
      <Router>
        <ScrollToTop>
          <Routes>
            <Route index element={<Home />}></Route>
            <Route path="/about" element={<About />}></Route>
          </Routes>
        </ScrollToTop>
      </Router>
    </div>
  );
}

export default App;