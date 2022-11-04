import './App.css';
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Home from './components/Home/Home';
import AddItem from './components/AddItem/AddItem';
import Header from './components/Header';
import { useState } from 'react';

function App() {
  const [checked, setChecked] = useState([])
  const [homeView, setHomeView] = useState(true)

  const handleMassDelete = (e) => {
    e.preventDefault();
    makeDeleteRequest(checked)
  } 

  const makeDeleteRequest = (checkedItems) => {
    if(checkedItems.length>0){
      fetch('http://129.151.223.209:3001/delete', 
      { 
        method: 'DELETE',
        body: JSON.stringify({ids: checkedItems})
      }
      ).then(res => { 
          console.log(JSON.stringify({ids: checkedItems}))  
          window.location.reload(true)
          console.log(res)
          return res.json(); 
      })
    } else {
      alert('Please select the items you want to delete!')
    }
  }

  return (
    <BrowserRouter>
      <Header onMassDelete={handleMassDelete} homeView={homeView}/>
      <Routes>
        <Route path="/" element={<Home checked={checked} setChecked={setChecked} setHomeView={setHomeView} />} />
        <Route path="/add" element={<AddItem setHomeView={setHomeView} />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
