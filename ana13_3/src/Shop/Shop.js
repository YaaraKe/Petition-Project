import React from 'react';
import Button from './Button';

    //render() method, this method returns HTML.
const Shop = (props)=> {
      const art = [
        {
          amount1: 94.12,
          amount2: 37,
          amount3: 35.08,
          amount4: 25.60,
          title1 : "Paper",
          title2 : "Scotch",
          title3 : "Sharpie v2",
          title4 : "Sharpie v1",
  
        }
    ]
  
      return (
        <>
          <div class="border">
            <h1>{art.title1}</h1>
            <img src="..\Shop\picShop\paper.jpg" alt="pic"></img>
            <div>$ {art.amount1}</div>
            <Button link="..\Shop\pageShop\picProduct1\product1.html"></Button>
          </div>
          <div class="border">
            <h1>{art.title2}</h1>
            <img src="..\Shop\picShop\scotch.jpg" alt="pic"></img>
            <div>$ {art.amount2}</div>
            <Button link="..\Shop\pageShop\picProduct2\product2.html"></Button>
          </div>
          <div class="border">
            <h1>{art.title3}</h1>
            <img src="..\Shop\picShop\Sharpi.jpg" alt="pic"></img>
            <div>$ {art.amount3}</div>
            <Button link="..\Shop\pageShop\picProduct3\product3.html"></Button>
          </div>
          <div class="border">
            <h1>{art.title4}</h1>
            <img src="..\Shop\picShop\Sharpi1.jpg" alt="pic"></img>
            <div>$ {art.amount4}</div>
            <Button link="..\Shop\pageShop\picProduct4\product4.html"></Button>
          </div>
        </>
      );
    }
export default Shop;  