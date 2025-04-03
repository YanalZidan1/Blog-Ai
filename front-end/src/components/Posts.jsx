import React, { useEffect, useState } from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import { Autoplay } from 'swiper/modules';
import AOS from 'aos';
import 'aos/dist/aos.css';
import ReactPaginate from 'react-paginate';
import Card from './ui/Card';

function Posts() {
    const [posts, setPosts] = useState([]);

    useEffect(() => {
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
        <div className='container-fluid p-0'>
            <div className="container p-5">
                <div className="col-md-12 filter d-flex gap-5 justify-content-between align-content-center">
                    {/* يمكنك إضافة المرشحات هنا إذا لزم الأمر */}
                </div>

                <div className="row mt-5">
                    {posts.map((post) => (
                        <div className="col-md-3 mb-4" key={post.id} data-aos="fade-up">
                            <Card post={post} />
                        </div>
                    ))}
                </div>

                {/* <div className="d-flex justify-content-center mt-4">
                    <ReactPaginate
                        previousLabel={'❮'}
                        nextLabel={'❯'}
                        breakLabel={'...'}
                        pageCount={pageCount}
                        marginPagesDisplayed={1}
                        pageRangeDisplayed={3}
                        onPageChange={handlePageClick}
                        containerClassName={'pagination'}
                        pageClassName={'page-item'}
                        pageLinkClassName={'page-link'}
                        previousClassName={'page-item'}
                        previousLinkClassName={'page-link'}
                        nextClassName={'page-item'}
                        nextLinkClassName={'page-link'}
                        breakClassName={'page-item'}
                        breakLinkClassName={'page-link'}
                        activeClassName={'active'}
                    />
                </div> */}
            </div>
        </div>
    );
}

export default Posts;
