import React from "react";
import "./button.css";

const Button = ({ link }) => {

  return (
    <button id="button" onClick={() => console.log(link)}>
      <a id="links" href={link}>Buy</a>
    </button>
  );
};
export default Button;
