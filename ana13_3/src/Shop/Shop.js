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
    amount1: 94.12,
    amount2: 37,
    amount3: 35.08,
    amount4: 25.6,
    title1: "Paper 01",
    title2: "Scotch 02",
    title3: "Sharpie v2",
    title4: "Sharpie v1",
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
        <h1>{art.title1}</h1>
        <img src={paper} alt=""></img>
        <div>$ {art.amount1}</div>
        <Button link={"../pageShop/picProduct1/product1.html"} />
      </div>
       <div class="border">
        <h1>{art.title2}</h1>
        <img src={scotch} alt=""></img>
        <div>$ {art.amount2}</div>
        <Button link={"../pageShop/picProduct2/product2.html"} />
      </div>
      <div class="border">
        <h1>{art.title3}</h1>
        <img src={sharpi} alt=""></img>
        <div>$ {art.amount3}</div>
        <Button link={"../pageShop/picProduct3/product3.html"} />
      </div>
      <div class="border">
        <h1>{art.title4}</h1>
        <img src={colorsharp} alt=""></img>
        <div>$ {art.amount4}</div>
        <Button link={"../pageShop/picProduct4/product4.html"} />
      </div>
    </>
  );
};
export default Shop;
