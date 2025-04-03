import React from 'react'

// components
import Hero from '../components/Hero'
import OurPosts from '../components/OurPosts'
import About from '../components/About'
import Contact from '../components/Contact'
import Footer from '../components/Footer'

function Home() {
  return (
    <div className='home container-fluid p-0'>
        <Hero
           title="Blog Ai"
           video={"/assets/videos/herobg.mp4"}
           text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum."

        />
        <OurPosts/>
        <About/>
        <Contact/>
    </div>
  )
}

export default Home
