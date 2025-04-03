import React, { useEffect } from 'react';
import AOS from 'aos'; // Import AOS
import 'aos/dist/aos.css'; // Import AOS styles

function About() {
  useEffect(() => {
    // Initialize AOS
    AOS.init({
      duration: 1000, // Animation duration
      once: true, // Only trigger once when the element is in view
    });
  }, []);

  return (
    <div className='about container-fluid p-0 mt-4 p-5' style={{backgroundColor:"rgb(2, 38, 63)"}}>
      <div className="container">
        <div className="row">

          {/* Left Side */}
          <div className="col-md-6 border-end  d-flex justify-content-center  flex-column" data-aos="fade-right">
            <h2 className='fw-bolder text-white'>About Blog AI</h2>
            <p className='text-white mt-3'>
              This is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It  kjdljljkdjk dkljlkjdklj dkljlkjdslkj ldjsljdlkd dkjld is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about AI. It is a blog about
            </p>
            <a href="" className='btn btn-outline-light mt-3 w-25' data-aos="fade-up">Read More</a>
          </div>

          {/* Right Side (Image) */}
          <div className="col-md-6 p-5" data-aos="fade-left">
            <img src="https://placehold.co/600x400" alt="" className='img-fluid' />
          </div>
          
        </div>
      </div>
    </div>
  );
}

export default About;
