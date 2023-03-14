import ListGroup from 'react-bootstrap/ListGroup';
import Breadcrumb from 'react-bootstrap/Breadcrumb';
import Card from 'react-bootstrap/Card';
import { FontAwesomeIcon }   from '@fortawesome/react-fontawesome'
import { faFolder , faFile }   from '@fortawesome/free-solid-svg-icons'
function Depots() {
  return (
<div className="container">
  <div className="row">
    <div className="col ">
    <ListGroup>
      <ListGroup.Item>Cras justo odio</ListGroup.Item>
      <ListGroup.Item>Dapibus ac facilisis in</ListGroup.Item>
      <ListGroup.Item>Morbi leo risus</ListGroup.Item>
      <ListGroup.Item>Porta ac consectetur ac</ListGroup.Item>
      <ListGroup.Item>Vestibulum at eros</ListGroup.Item>
    </ListGroup>
    </div>
    <div className="col ">
        <div className="row">
            <Breadcrumb>
            <Breadcrumb.Item href="#">Home</Breadcrumb.Item>
            <Breadcrumb.Item href="https://getbootstrap.com/docs/4.0/components/breadcrumb/">
                Library
            </Breadcrumb.Item>
            <Breadcrumb.Item active>Data</Breadcrumb.Item>
            </Breadcrumb>
        </div>
        <div className="row">
            <Card>
                <Card.Body>
                    <ul>
                        <li>
                            <FontAwesomeIcon icon={faFolder} className="hover:text-red-500">
                            </FontAwesomeIcon> test
                        </li>
                        <li>
                            <FontAwesomeIcon icon={faFile}>
                            </FontAwesomeIcon> test
                        </li>
                        <li> 
                            <FontAwesomeIcon icon={faFile}>
                            </FontAwesomeIcon> test
                        </li>
                    </ul>
                </Card.Body>
            </Card>
        </div>
    </div>
    <div className="col ">
      One of three columns
    </div>
  </div>
</div>
  );
}

export default Depots;
