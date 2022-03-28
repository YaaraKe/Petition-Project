import React from "react";
import "./button.css";

const Button = ({ link }) => {

  //todo : check if a need to be before the button
  return (
    <a id="links" href={link}> <button id="button" onClick={() => console.log(link)}>
      Buy</button></a>
  );
};
export default Button;
