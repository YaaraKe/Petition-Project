import React from 'react';

const Button =(props)=> {

    const handleClick=()=> {
      location.href = this.props.link;
    }

      return (
        <button onClick={() => this.handleClick()}>
          Buy
          </button>
      );
    }
export default Button;   