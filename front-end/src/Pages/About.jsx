import React, { useEffect } from 'react';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Header from '../components/ui/Header';

function About() {
  useEffect(() => {
    AOS.init({
      duration: 1000,
      once: true, // تشغيل التأثير مرة واحدة فقط عند التمرير
    });
  }, []);

  return (
    <div className='about container-fluid p-0'>

      <Header
        title="About"
        text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum."
        backgroundimg='/assets/images/bg3.jpg'
        hight={'60vh'}
      />

      <div className="container">
        <div className="row about-content p-5">
          
          <div className="col-md-6 d-flex justify-content-center align-items-start flex-column" data-aos="fade-left">
            <h1 data-aos="fade-up">About Us</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
            </p>
          </div>

          <div className="col-md-6" data-aos="fade-right">
            <div className="img-container d-flex overflow-hidden">
              <img src="/assets/images/bg2.jpg" alt="" 
                style={{ width: '100%', height: '100%', objectFit: 'cover', borderRadius: '5px' }} 
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default About;
