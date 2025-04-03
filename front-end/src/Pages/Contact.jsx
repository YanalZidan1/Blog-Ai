import React, { useEffect } from 'react';
import AOS from 'aos';
import 'aos/dist/aos.css';

function Contact() {
    useEffect(() => {
        AOS.init({
            duration: 1000,
            once: true,
        });
    }, []);

    return (
        <div className='contact container-fluid p-0' style={{
            backgroundImage: 'url(/assets/images/bg3.jpg)',
            backgroundSize: 'contain',
            backgroundRepeat: 'no-repeat',
            backgroundColor: 'rgba(0, 0, 0, 0.5)',
            backgroundBlendMode: 'multiply',
            backgroundAttachment: 'fixed',
            width: '100%',
            height: 'auto',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            color: 'white',
            textAlign: 'center',
        }}>
            <div className="contact-info p-5 container mt-5">
                <h1 className="text-white" data-aos="fade-up">Contact Us</h1>

                <div className="row p-5 mt-3">
                    
                    <div className="col-md-6" data-aos="fade-left">
                        <form action="" className='text-start'>
                            <div className="mb-3">
                                <label htmlFor="name" className='form-label' style={{ color: '#fff' }}>Name</label>
                                <input type="text" className='form-control' id='name' />
                            </div>
                            <div className="mb-3">
                                <label htmlFor="email" className='form-label' style={{ color: '#fff' }}>Email</label>
                                <input type="email" className='form-control' id='email' />
                            </div>
                            <div className="mb-3">
                                <label htmlFor="message" className='form-label' style={{ color: '#fff' }}>Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" className='form-control'></textarea>
                            </div>
                            <button type='submit' className='btn btn-form'>Submit</button>
                        </form>
                    </div>

                    <div className="col-md-6 px-5" data-aos="fade-right">
                        <ul className='list-unstyled text-start'>
                            <li className='py-2'>
                                <i className="fa fa-map-marker" style={{ color: '#fff' }}></i>
                                <span className='ms-2'>1234 Street Name, City Name, United States</span>
                            </li>
                            <li className='py-2'>
                                <i className="fa fa-phone" style={{ color: '#fff' }}></i>
                                <span className='ms-2'>+1 234 567 890</span>
                            </li>
                            <li className='py-2'>
                                <i className="fa fa-envelope" style={{ color: '#fff' }}></i>
                                <span className='ms-2'>
                                    <a href="mailto:info@example.com" style={{ color: '#fff' }}>info@example.com</a>
                                </span>
                            </li>
                            <li className='py-2'>
                                <i className="fa fa-clock" style={{ color: '#fff' }}></i>
                                <span className='ms-2'>Monday - Friday: 9:00 AM to 5:00 PM</span>
                            </li>
                        </ul>
                        <p className='text-white text-start'>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio esse possimus accusamus maiores voluptates quasi magni eligendi tenetur dolorem libero.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Contact;
