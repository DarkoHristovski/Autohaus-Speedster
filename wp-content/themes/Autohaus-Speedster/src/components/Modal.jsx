import React, { useState } from "react";

const Modal = ({ cars, currentIndex, currentImg, closeCarHandler }) => {
  const [currentCar, setCurrentCar] = useState(cars[currentIndex]);
  //const [prevoiusCar, setPrevoiusCurrentCar] = useState(currentIndex);
  const [carIndex, setCarIndex] = useState(currentIndex);

  const prevCarHandler = () => {
    setCarIndex((prev) => prev - 1);
    setCurrentCar(cars[carIndex - 1]);
  };

  console.log("cars.lengt:", cars.length);
  console.log("carIndex:", carIndex);

  const nextCarHandler = () => {
    setCarIndex((prev) => prev + 1);
    setCurrentCar(cars[carIndex + 1]);
  };

  return (
    <section className="modal">
      <div className="modal-content">
        <div className="close" onClick={closeCarHandler}>
          <svg
            fill="#ffffff"
            data-v-a0e00534=""
            width={24}
            height={24}
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
            className="close-icon"
          >
            <path d="M6.41408 5.00002C6.0236 4.60953 5.3905 4.60953 5.00002 5.00002C4.60953 5.3905 4.60953 6.0236 5.00002 6.41408L10.586 12L5.00002 17.586C4.60953 17.9764 4.60953 18.6095 5.00002 19C5.3905 19.3905 6.0236 19.3905 6.41408 19L12 13.4141L17.586 19C17.9764 19.3905 18.6095 19.3905 19 19C19.3905 18.6095 19.3905 17.9764 19 17.586L13.4141 12L19 6.41408C19.3905 6.0236 19.3905 5.3905 19 5.00002C18.6095 4.60953 17.9764 4.60953 17.586 5.00002L12 10.586L6.41408 5.00002Z" />
          </svg>
        </div>

        {carIndex > 0 ? (
          <div className="arrow-left" onClick={prevCarHandler}>
            <svg
              fill="#ffffff"
              height="30px"
              width="30px"
              version="1.1"
              id="Layer_1"
              xmlns="http://www.w3.org/2000/svg"
              xmlnsXlink="http://www.w3.org/1999/xlink"
              viewBox="0 0 512 512"
              xmlSpace="preserve"
            >
              <g>
                <g>
                  <path
                    d="M0,0v512h512V0H0z M384,277.333H179.499l48.917,48.917c8.341,8.341,8.341,21.824,0,30.165
			c-4.16,4.16-9.621,6.251-15.083,6.251c-5.461,0-10.923-2.091-15.083-6.251l-85.333-85.333c-1.963-1.963-3.52-4.309-4.608-6.933
			c-2.155-5.205-2.155-11.093,0-16.299c1.088-2.624,2.645-4.971,4.608-6.933l85.333-85.333c8.341-8.341,21.824-8.341,30.165,0
			s8.341,21.824,0,30.165l-48.917,48.917H384c11.776,0,21.333,9.557,21.333,21.333S395.776,277.333,384,277.333z"
                  />
                </g>
              </g>
            </svg>
          </div>
        ) : (
          ""
        )}

        {carIndex < cars.length - 1 ? (
          <div className="arrow-right" onClick={nextCarHandler}>
            <svg
              fill="#ffffff"
              height="30px"
              width="30px"
              version="1.1"
              id="Layer_1"
              xmlns="http://www.w3.org/2000/svg"
              xmlnsXlink="http://www.w3.org/1999/xlink"
              viewBox="0 0 512 512"
              xmlSpace="preserve"
            >
              <g>
                <g>
                  <path
                    d="M0,0v512h512V0H0z M403.691,264.149c-1.088,2.603-2.645,4.971-4.608,6.933l-85.333,85.333
			c-4.16,4.16-9.621,6.251-15.083,6.251c-5.461,0-10.901-2.091-15.083-6.251c-8.32-8.341-8.32-21.845,0-30.165l48.917-48.917H128
			c-11.776,0-21.333-9.557-21.333-21.333c0-11.797,9.557-21.333,21.333-21.333h204.501l-48.917-48.917
			c-8.32-8.341-8.32-21.845,0-30.165c8.341-8.341,21.845-8.341,30.165,0l85.333,85.312c1.963,1.963,3.52,4.331,4.608,6.955
			C405.845,253.056,405.845,258.923,403.691,264.149z"
                  />
                </g>
              </g>
            </svg>
          </div>
        ) : (
          ""
        )}

        <div className="img-wrapper">
          <img src={currentCar.image} alt={currentCar.brand} />
          <div className="d-flex modal-car-detail">
            <p>
              {currentCar.brand} <span>{currentCar.model}</span>
            </p>
            <p>{currentCar.price}</p>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Modal;
