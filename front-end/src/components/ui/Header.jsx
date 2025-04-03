import React, { useEffect } from 'react';
import AOS from 'aos'; // Import AOS
import 'aos/dist/aos.css'; // Import AOS styles

function Header({ title, text, backgroundimg , background ,hight }) {

    useEffect(() => {
        // Initialize AOS when the component mounts
        AOS.init({
            duration: 1000,
            once: true, // Trigger the animation only once
        });
    }, []);

    return (
        <div
            className='header container-fluid p-0'
            style={{
                backgroundImage: `url(${backgroundimg})`,
                backgroundSize: 'contain',
                backgroundRepeat: 'no-repeat',
                backgroundColor: background || 'rgba(0, 0, 0, 0.5)',
                backgroundBlendMode: 'multiply',
                backgroundAttachment: 'fixed',
                width: '100%',
                height: '50vh' || hight,
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                color: 'white',
                textAlign: 'center',
                position: 'relative',
                zIndex: '1',
            }}
        >
            <div
                className='header-content'
                style={{
                    position: 'relative',
                    zIndex: '2',
                    padding: '20px',
                }}
                data-aos="fade-up" // Apply AOS effect for fade-up
            >
                <h1 data-aos="fade-down" data-aos-delay="100">{title}</h1> {/* Fade-in effect for the title */}
                <p data-aos="fade-up " data-aos-delay="200" className='mt-3'>{text}</p> {/* Fade-in effect for the text */}
            </div>

        </div>
    )
}

export default Header;
