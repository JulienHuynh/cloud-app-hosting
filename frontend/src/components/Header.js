import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';

function Header() {
  return (
    <>
      <Navbar bg="dark" variant="dark">
        <Container>
          <Navbar.Brand href="/">GROUPE 16 - plateforme d’hébergement</Navbar.Brand>
          <Nav className="me-auto">
            <Nav.Link href="/">SUIVI</Nav.Link>
            <Nav.Link href="/depots">DEPOTS</Nav.Link>
          </Nav>
        </Container>
      </Navbar>
    </>
  );
}

export default Header;