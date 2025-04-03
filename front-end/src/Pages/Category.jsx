import React from 'react'

// components
import Posts from '../components/Posts'
import Header from '../components/ui/Header'


function Category() {
  return (
    <div className='category container-fluid p-0'>
       <Header
          title="Category"
          text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum."
          backgroundimg="/assets/images/bg1.jpg"
          height={"60vh"}
       />

       <Posts/>
      
    </div>
  )
}

export default Category
