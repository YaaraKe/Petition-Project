import React from "react";
import Button from "./Button";
import paper from "../picShop/paper.jpg";
import scotch from "../picShop/scotch.jpg";
import sharpi from "../picShop/Sharpi.jpg";
import poster from "../picShop/shop_gif2.gif";
import colorsharp from "../picShop/Sharpi1.jpg";
import "./shop.css";
//bootstrap
import "bootstrap/dist/css/bootstrap.min.css";
//Axios for get request
import axios from "axios";

//render() method, this method returns HTML.
const Shop = () => {
  const art = {
    amount1: "5.00",
    amount2: "15.00",
    amount3: "6.00",
    amount4: "12.00",
    title1: "Poster Board",
    title2: "Scotch",
    title3: "Sharpie Fine Tip Marker",
    title4: "Sharpie Accent Pocket",
  };

  return (
    <>
      <img id="poster" src={poster} alt=""></img>
      <h3>Shop</h3>

      <div class="border_1">
        <img class="img_shop" src={paper} alt=""></img>
        <b>{art.title1}</b>
        <div>{art.amount1} ₪</div>
        <Button link={"../pageShop/picProduct1/product1.php"} />
      </div>
      <div class="border_1">
        <img class="img_shop" src={scotch} alt=""></img>
        <b>{art.title2}</b>
        <div>{art.amount2} ₪</div>
        <Button link={"../pageShop/picProduct2/product2.php"} />
      </div>
      <div class="border_1">
        <img class="img_shop" src={sharpi} alt=""></img>
        <b>{art.title3}</b>
        <div>{art.amount3} ₪</div>
        <Button link={"../pageShop/picProduct3/product3.php"} />
      </div>
      <div class="border_1">
        <img class="img_shop" src={colorsharp} alt=""></img>
        <b>{art.title4}</b>
        <div>{art.amount4} ₪</div>
        <Button link={"../pageShop/picProduct4/product4.php"} />
      </div>
      <div id="clear"></div>
      <div class="bg-white">
        <div class="py-2 footer_1">
          <div class="container text-center">
            <p class="text-muted mb-0 py-2">
              © 2022 UCanClaim All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </>
  );
};
export default Shop;
