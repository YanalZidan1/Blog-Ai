import React, { useEffect } from 'react';
import AOS from 'aos'; // Import AOS
import 'aos/dist/aos.css'; // Import AOS styles

function Contact() {
  useEffect(() => {
    // Initialize AOS
    AOS.init({
      duration: 1000, // Animation duration
      once: true, // Only trigger once when the element is in view
    });
  }, []);

  return (
    <div className='contact container-fluid p-0'>
      <div className="container p-5">
        <h1 className="text-center" style={{color: 'rgb(2,38, 63)'}} data-aos="fade-up">
          Contact Us
        </h1>
        <div className="row d-flex justify-content-center gap-3">

          {/* Left Side */}
          <div className="col-md-5" data-aos="fade-right">
            <form action="">
              <div className="mb-3">
                <label htmlFor="name" className='form-label' style={{color: 'rgb(2,38, 63)'}}>Name</label>
                <input type="text" className='form-control' id='name' />
              </div>
              <div className="mb-3">
                <label htmlFor="email" className='form-label' style={{color: 'rgb(2,38, 63)'}}>Email</label>
                <input type="email" className='form-control' id='email' />
              </div>
              <div className="mb-3">
                <label htmlFor="message" className='form-label' style={{color: 'rgb(2,38, 63)'}}>Message</label>
                <textarea name="message" id="message" cols="30" rows="5" className='form-control'></textarea>
              </div>
              <button type='submit' className='btn btn-form'>Submit</button>
            </form>
          </div>

          {/* Right Side */}
          <div className="col-md-5 mt-4" data-aos="fade-left">
            <ul className='list-unstyled'>
              <li className='py-2'>
                <i className="fa fa-map-marker" style={{ color: 'rgb(2, 38, 63)' }}></i>
                <span className='ms-2'>
                  1234 Street Name, City Name, United States
                </span>
              </li>

              <li className='py-2'>
                <i className="fa fa-phone" style={{ color: 'rgb(2, 38, 63)' }}></i>
                <span className='ms-2'>
                  +1 234 567 890
                </span>
              </li>

              <li className='py-2'>
                <i className="fa fa-envelope" style={{ color: 'rgb(2, 38, 63)' }}></i>
                <span className='ms-2'>
                  <a href="mailto:info@example.com" style={{ color: 'rgb(2,38, 63)' }}>info@example.com</a>
                </span>
              </li>

              <li className='py-2'>
                <i className="fa fa-clock" style={{ color: 'rgb(2,38, 63)' }}></i>
                <span className='ms-2'>
                  Monday - Friday: 9:00 AM to 5:00 PM
                </span>
              </li>
            </ul>

            <p className='text-muted'>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio esse possimus accusamus maiores voluptates quasi magni eligendi tenetur dolorem libero. Reiciendis perspiciatis ratione molestias, eos ipsum tenetur est voluptatibus voluptates cumque accusamus? Voluptas natus consequatur harum eos laboriosam eaque obcaecati dolorum quia officiis iste soluta accusantium, incidunt sint quis animi, saepe commodi omnis accusamus magnam, temporibus ea sit. Quibusdam consequatur, explicabo reiciendis tempore assumenda voluptatibus?
            </p>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Contact;
