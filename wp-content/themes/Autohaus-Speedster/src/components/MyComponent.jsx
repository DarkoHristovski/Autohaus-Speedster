import React from "react";
import { useState } from "react";
import Cars from "./Cars";
import Modal from "./Modal";

const carData = require("../cars.json");

const MyComponent = () => {
  const [cars, setCars] = useState(carData);
  const [openModal, setOpenModal] = useState(null);
  const [currentImg, setCurrentImg] = useState(null);
  const [currentIndex, setCurrentIndex] = useState(null);

  const openCarHandler = (img, index) => {
    setOpenModal(true);
    setCurrentImg(img);
    setCurrentIndex(index);
  };

  const closeCarHandler = () => {
    setOpenModal(null);
  };

  return (
    <div>
      <div className="cars-gallery d-flex">
        {cars.map((x, i) => (
          <Cars key={i} cars={x} index={i} openCarHandler={openCarHandler} />
        ))}
      </div>
      {openModal && (
        <Modal
          cars={cars}
          currentIndex={currentIndex}
          currentImg={currentImg}
          closeCarHandler={closeCarHandler}
        />
      )}
    </div>
  );
};

export default MyComponent;
