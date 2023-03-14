
import Card from 'react-bootstrap/Card';
import useGetDiskConsomation from '../Hook/useGetDiskConsomation'
import {useEffect, useState} from "react";
function Suivi() {
    const [diskInfo, setDiskInfo] = useState([]);
    const getDiskInfo = useGetDiskConsomation();

    useEffect(() => {
        getDiskInfo().then(data => setDiskInfo(data.users));
    }, [])
  return (
    <div className="container-lg text-center view">
        <div className="row">
        <h1 className="" >
            SUIVI DE L'UTILISATION
        </h1>
        </div>
        <div className="row">
        <Card>
            <Card.Body>Taille d'espace disque : {diskInfo} </Card.Body>
        </Card>
        <br />
        <Card>
            <Card.Body>Taille de la base de donnée : </Card.Body>
        </Card>
        <Card>
            <Card.Body>Backups Quotidien</Card.Body>
        </Card>

        </div>

    </div>
  );
}



export default Suivi;



