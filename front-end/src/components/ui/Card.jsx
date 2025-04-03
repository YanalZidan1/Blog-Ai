import React from 'react'
import { Link } from 'react-router-dom'
function Card({post}) {

    // console.log(post)
    if (!post) {
        return null;
    }
    return (
        <Link className='post-card overflow-hidden d-flex flex-column gap-3 rounded shadow-sm text-decoration-none' to={`/posts/${post.id}`}>
            <div className="img-card d-flex overflow-hidden " style={{ height: '200px' }}>
                <img src={`http://localhost:8000/storage/${post.card_cover}`}  alt="" className='img-fluid' style={{ width: '100%', height: '100%', objectFit: 'cover' }} />
                <div
                 className="overlay"
                 style={{
                    position: 'absolute',
                    top: 10,
                    left: 195,
                    width: 'auto',
                    height: '30px',
                    backgroundColor: 'rgba(0, 0, 0, 0.5)',
                    opacity: 1,
                    transition: 'opacity 0.3s ease',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    color: 'white',
                    fontWeight: 'bold',
                    textAlign: 'center',
                    borderRadius: '5px',
                    transition: ' 0.5s ease',
                    fontSize:'14px',
                    padding:'5px'
                    }}
                >category</div>
            </div>
            <div className="card-body text-start p-3">
                <div className="header-body d-flex justify-content-between text-black">
                    <h5 className='card-title'>{post.En_title.slice(0, 15)}</h5>
                    <span className='card-date'>{post.created_at.slice(0, 10) }</span>
                </div>
                <p className='card-text mt-4 text-black'>
                    {post.En_content.slice(0, 100)}
                </p>
            </div>
        </Link>
    )
}

export default Card
