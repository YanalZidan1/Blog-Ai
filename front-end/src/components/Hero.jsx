import React, { useEffect } from 'react';
import AOS from 'aos';
import 'aos/dist/aos.css';

function Hero({title , text , video ,height }) {
  useEffect(() => {
    AOS.init({
      duration: 1000, // Duration of the animation
      once: true,     // Animation happens only once
    });
  }, []);

  return (
    <div 
      className="hero-container"
      style={{
        position: "relative",
        width: "100%",
        height: height || "80vh",
        overflow: "hidden",
        display: "flex",
        alignItems: "center",
        justifyContent: "center",
        textAlign: "center",
        color: "white"
      }}
    >
      <video 
        className="background-video"
        src={video}
        autoPlay
        loop
        muted
        style={{
          position: "absolute",
          top: "50%",
          left: "50%",
          width: "100%",
          height: "100%",
          objectFit: "cover",
          transform: "translate(-50%, -50%)",
          zIndex: "-1"
        }}
      ></video>

      <div 
        className="hero-content"
        style={{
          position: "relative",
          zIndex: "1",
          padding: "20px",
        }}
        data-aos="fade-up" // Apply the fade-up animation to this section
      >
        <h1 className='fw-bolder' style={{fontSize:"80px"}} data-aos="zoom-in" data-aos-delay="300">{title}</h1>
        <p className='mt-3' data-aos="fade-up" data-aos-delay="500">
         {text}
        </p>
      </div>
    </div>
  );
}

export default Hero;
