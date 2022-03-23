import React from "react";
import "./button.css";

const Button = ({ link }) => {

  return (
    <button onClick={() => console.log(link)}>
      <a href={link}>Buy</a>
    </button>
  );
};
export default Button;
