import React, { useEffect, useState } from 'react';
import AOS from 'aos'; // Import AOS
import 'aos/dist/aos.css'; // Import AOS styles
import { Link } from 'react-router-dom';

function Navbar() {

    const [scrolled, setScrolled] = useState(false);

    useEffect(() => {
      const handleScroll = () => {
        if (window.scrollY > 50) {
          setScrolled(true);
        } else {
          setScrolled(false);
        }
      };
  
      window.addEventListener("scroll", handleScroll);
      return () => {
        window.removeEventListener("scroll", handleScroll);
      };
    }, []);

    useEffect(() => {
      // Initialize AOS
      AOS.init({
        duration: 1000,
        once: true, // Trigger the animation only once
      });
    }, []);

    return (
        <nav className={`navbar navbar-expand-lg px-5 fixed-top ${scrolled ? "scrolled-navbar" : ""}`} data-aos="fade-down">
            <div className="container-fluid">
                {/* Logo with animation */}
                <Link className="navbar-brand text-white fw-bolder" to="/" data-aos="fade-right">
                    Blog AI
                </Link>                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarNav">
                    {/* Navbar Links with animation */}
                    <ul className="navbar-nav mx-auto d-flex gap-4 text-white">
                        <li className="nav-item" data-aos="fade-up" data-aos-delay="100">
                            <Link className="nav-link active text-white" aria-current="page" to="/">Home</Link>
                        </li>
                        <li className="nav-item" data-aos="fade-up" data-aos-delay="200">
                            <Link className="nav-link text-white" to="/Category">Categories</Link>
                        </li>
                        <li className="nav-item" data-aos="fade-up" data-aos-delay="300">
                            <Link className="nav-link text-white" to="/About">About</Link>
                        </li>
                        <li className="nav-item" data-aos="fade-up" data-aos-delay="400">
                            <Link className="nav-link text-white" to="/Contact">Contact</Link>
                        </li>
                    </ul>

                    {/* Buttons with animation */}
                    <div className="d-flex gap-2">
                        {/*select language */}
                        <div className="dropdown">
                          <button className="btn btn-outline-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i className="fa-solid fa-globe"></i>
                          </button>
                          <ul className="dropdown-menu languge" aria-labelledby="dropdownMenuButton" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
                            <li><a className="dropdown-item " href="#">En</a></li>
                            <li><a className="dropdown-item" href="#">Ar</a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    )
}

export default Navbar;
