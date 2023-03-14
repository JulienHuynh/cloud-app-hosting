
import './App.css';
import Suivi from './components/Suivi';
import Depots from './components/Depots';
import Header from './components/Header';
import { Routes, Route} from 'react-router-dom'

function App() {
  return (
    <>
    <Header />
    <Routes>
      <Route path="/" element={<Suivi />} />
      <Route path="/depots" element={<Depots />}/>
    </Routes>

    </>
  );
}

export default App;
