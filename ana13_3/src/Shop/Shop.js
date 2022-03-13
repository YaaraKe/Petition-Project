import React from 'react';
import Button from './Button';
import paper from '../picShop/paper.jpg';
import scotch from '../picShop/scotch.jpg';
import sharpi from '../picShop/Sharpi.jpg';
import colorsharp from '../picShop/Sharpi1.jpg';
import './shop.css'

    //render() method, this method returns HTML.
const Shop = ()=> {
      const art = 
        {
          amount1: 94.12,
          amount2: 37,
          amount3: 35.08,
          amount4: 25.60,
          title1 : "Paper 01",
          title2 : "Scotch 02",
          title3 : "Sharpie v2",
          title4 : "Sharpie v1",
          link1: "lol",
  
        }


      return (
        <>
          <div class="border">
            <h1>{art.title1}</h1>
            <img src={paper} alt=""></img>
            <div>$ {art.amount1}</div>
            <Button link={art.link1}></Button>
          </div>
          <div class="border">
            <h1>{art.title2}</h1>
            <img src={scotch} alt=""></img>
            <div>$ {art.amount2}</div>
            <Button link="..\Shop\pageShop\picProduct2\product2.html"></Button>
          </div>
          <div class="border">
            <h1>{art.title3}</h1>
            <img src={sharpi} alt=""></img>
            <div>$ {art.amount3}</div>
            <Button link="..\Shop\pageShop\picProduct3\product3.html"></Button>
          </div>
          <div class="border">
            <h1>{art.title4}</h1>
            <img src={colorsharp} alt=""></img>
            <div>$ {art.amount4}</div>
            <Button link="..\Shop\pageShop\picProduct4\product4.html"></Button>
          </div>
        </>
      );
    }
export default Shop;  