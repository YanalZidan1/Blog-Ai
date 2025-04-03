import { Route, Routes } from 'react-router-dom';
import './App.css';

// components
import Navbar from './components/ui/Navbar';
import Footer from './components/Footer';

// pages
import Category from './Pages/Category';
import Home from './Pages/Home';
import Post_id from './Pages/Post_id';
import About from './Pages/About';
import Contact from './Pages/Contact';


function App() {

  return (
    <div className="App">
      
    
      {/* navbar */}
      <Navbar />
      {/* routes */}
      <Routes>

        <Route path="/" element={<Home />} />
        <Route path="/Category" element={<Category />} />
        <Route path="/posts/:id" element={<Post_id />} />
        <Route path="/About" element={<About />} />
        <Route path="/Contact" element={<Contact />} />

      </Routes>
      {/* footer */}
      <Footer/>
    </div>
  );
}

export default App;
