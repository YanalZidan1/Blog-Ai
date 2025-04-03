import React, { useEffect, useState } from 'react';
import { Link, useParams } from 'react-router-dom';
import Header from '../components/ui/Header';

function Post_id() {
    const { id } = useParams();
    const [post, setPost] = useState(null);

    useEffect(() => {
        fetch(`http://localhost:8000/posts/${id}`) 
            .then(response => response.json())
            .then(data => {
                if (data.post) { 
                    setPost(data.post);
                }
            })
            .catch(error => console.error('Error fetching post:', error));
    }, [id]);

    if (!post) {
        return <div>Loading...</div>;
    }

    return (
        <div className='post-id container-fluid p-0'>
            <Header
                backgroundimg={`http://localhost:8000/storage/${post.post_cover}`}
                height={"40vh"}
            />
            <div className="container p-5">
                <div className="head d-flex justify-content-between align-items-center">
                    <div className="d-flex align-items-center gap-2">
                        <h3>{post.En_title}</h3> 
                        <strong className='fw-normal'>{post.created_at}</strong>
                    </div>

                    <Link to="/Category" className='Category_id text-decoration-none'>{post.category}</Link>
                </div>
                <div className="content mt-4">
                    <p>{post.En_content}</p>  
                </div>
            </div>
        </div>
    );
}

export default Post_id;
