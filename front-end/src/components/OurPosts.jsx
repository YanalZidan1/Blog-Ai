import React, { useEffect, useState } from 'react';
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import Card from './ui/Card';
import AOS from 'aos';
import 'aos/dist/aos.css';
import { Link } from 'react-router-dom';

function OurPosts() {
  const [posts, setPosts] = useState([]);

  useEffect(() => {
    // Initialize AOS
    AOS.init({
      duration: 1000,
      once: true,
    });
  }, []);

  useEffect(() => {
    fetch('http://localhost:8000/api/posts')
      .then(response => response.json())
      .then(data => {
        if (data.posts) {
          setPosts(data.posts); 
        }
      })
      .catch(error => console.error('Error fetching posts:', error));
  }, []);

  return (
    <div className='our-posts container-fluid p-0'>

      {/* Title */}
      <div className="col-md-12 mt-4 text-center" data-aos="fade-up">
        <h1 className='text-center' style={{ color: 'rgb(2,38, 63)' }}>Our Posts</h1>
      </div>

      {/* Swiper Container */}
      <div className="container mt-5">
        <Swiper
          spaceBetween={40}
          slidesPerView={4}
          autoplay={true}
          loop={true}
          className="mySwiper d-flex p-3"
        >
          {/* Applying AOS to each SwiperSlide */}
          {posts.map((post, index) => (
            <SwiperSlide key={index} className='swiper-slide col-md-3' data-aos="flip-left">
              <Card post={post} />
            </SwiperSlide>
          ))}
        </Swiper>
      </div>

      {/* Category Button */}
      <div className="col-md-12 text-center mt-5" data-aos="fade-up" data-aos-delay="200">
        <Link to="/Category" className="btn btn-our-posts px-5">Categories</Link>
      </div>
    </div>
  );
}

export default OurPosts;
