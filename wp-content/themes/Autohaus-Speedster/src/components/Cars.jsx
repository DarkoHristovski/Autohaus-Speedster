import React, { useState } from "react";
import Modal from "./Modal";

const Cars = ({ cars, openCarHandler, index }) => {
  return (
    <>
      <div
        className="card card-galery-item"
        onClick={() => openCarHandler(cars.image, index)}
      >
        <div className="img-wrapper">
          <img src={cars.image} alt={cars.brand} />
        </div>
        <div className="card-text d-flex">
          <p>
            {cars.brand} <span>{cars.model}</span>
          </p>
          <p>{cars.price}</p>
        </div>
      </div>
    </>
  );
};

export default Cars;
