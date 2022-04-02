import React from "react";
import Button from "./Button";
import paper from "../picShop/paper.jpg";
import scotch from "../picShop/scotch.jpg";
import sharpi from "../picShop/Sharpi.jpg";
import colorsharp from "../picShop/Sharpi1.jpg";
import "./shop.css";
//bootstrap
import "bootstrap/dist/css/bootstrap.min.css";
//Axios for get request
import axios from "axios";

//render() method, this method returns HTML.
const Shop = () => {
  const art = {
    amount1: 20,
    amount2: 5,
    amount3: 2,
    amount4: 6,
    title1: "Pacon Peacock Poster",
    title2: "Scotch Sure Packagin",
    title3: "Sharpie Fine Tip Mar",
    title4: "Sharpie Pocket Highl",
  };

  // const art1 = [
  //   {
  //     amount: 94.12,
  //     title: "Paper 01",
  //     link: "heyhey",
  //   }
  // ];

  return (
    <>
      {/* {art.map((artItem) => (
        <div class="border">
          <h1>{artItem.title}</h1>
          <img src={paper} alt=""></img>
          <div>$ {artItem.amount}</div>
          <Button link={artItem.link} />
        </div>
      ))} */}
      <div class="border">
        <h3>{art.title1}</h3>
        <img src={paper} alt=""></img>
        <div>$ {art.amount1}</div>
        <Button link={"../pageShop/picProduct1/product1.php"} />
      </div>
       <div class="border">
        <h3>{art.title2}</h3>
        <img src={scotch} alt=""></img>
        <div>$ {art.amount2}</div>
        <Button link={"../pageShop/picProduct2/product2.php"} />
      </div>
      <div class="border">
        <h3>{art.title3}</h3>
        <img src={sharpi} alt=""></img>
        <div>$ {art.amount3}</div>
        <Button link={"../pageShop/picProduct3/product3.php"} />
      </div>
      <div class="border">
        <h3>{art.title4}</h3>
        <img src={colorsharp} alt=""></img>
        <div>$ {art.amount4}</div>
        <Button link={"../pageShop/picProduct4/product4.php"} />
      </div>
    </>
  );
};
export default Shop;
