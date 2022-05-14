import React from "react";
import Button from "./Button";
import Form from "./Form";
import paper from "../picShop/paper.jpg";
import scotch from "../picShop/scotch.jpg";
import sharpi from "../picShop/Sharpi.jpg";
import poster from "../picShop/shop_gif2.gif";
import colorsharp from "../picShop/Sharpi1.jpg";
import mic from "../picShop/mic.jpg";
import stapler from "../picShop/stapler.jpg";
import cliper from "../picShop/cliper.jpg";
import "./shop.css";
//bootstrap
import "bootstrap/dist/css/bootstrap.min.css";
//Axios for get request
import axios from "axios";

//render() method, this method returns HTML.
const Shop = () => {
  const art = {
    title1: "	Poster Board	",
    title2: "	Scotch	",
    title3: "	Sharpie Fine Tip Marker	",
    title4: "	Sharpie Accent Pocket	",
    title5: "	Blue Microphone	",
    title6: "	Heavy-Duty Binder Clips	",
    title7: "	Desktop Stapler	",
    amount1: "	5	",
    amount2: "	15	",
    amount3: "	6	",
    amount4: "	12	",
    amount5: "	120	",
    amount6: "	20	",
    amount7: "	24	",
  };

  return (
    <>
      <img id="poster" src={poster} alt=""></img>
      <h3>Shop</h3>
      <div class="border_1">
        <img class="img_shop" src={paper} alt=""></img>
        <b>{art.title1}</b>
        <div>{art.amount1} ₪</div>
        <Button link={"../pageShop/product.php?data=10001"} />
      </div>
      <div class="border_1">
        <img class="img_shop" src={scotch} alt=""></img>
        <b>{art.title2}</b>
        <div>{art.amount2} ₪</div>
        <Button link={"../pageShop/product.php?data=20001"} />
      </div>
      <div class="border_1">
        <img class="img_shop" src={sharpi} alt=""></img>
        <b>{art.title3}</b>
        <div>{art.amount3} ₪</div>
        <Button link={"../pageShop/product.php?data=30001"} />
      </div>
      <div class="border_1">
        <img class="img_shop" src={colorsharp} alt=""></img>
        <b>{art.title4}</b>
        <div>{art.amount4} ₪</div>
        <Button link={"../pageShop/product.php?data=40001"} />
      </div>
      <div class="border_1">
        <img class="img_shop" src={mic} alt=""></img>
        <b>{art.title5}</b>
        <div>{art.amount5} ₪</div>
        <Button link={"../pageShop/product.php?data=50001"} />
      </div>{" "}
      <div class="border_1">
        <img class="img_shop" src={cliper} alt=""></img>
        <b>{art.title6}</b>
        <div>{art.amount6} ₪</div>
        <Button link={"../pageShop/product.php?data=60001"} />
      </div>{" "}
      <div class="border_1">
        <img class="img_shop" src={stapler} alt=""></img>
        <b>{art.title7}</b>
        <div>{art.amount7} ₪</div>
        <Button link={"../pageShop/product.php?data=70001"} />
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
