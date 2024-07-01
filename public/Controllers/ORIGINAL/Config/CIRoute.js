// CIRoute.js
import axios from "axios";

class CIRoute {
  static instance = null;

  async before(request) {
    // Do something here
    const rotas = await axios.get('http://localhost:8000/api/modulos');
    return rotas.data; // assuming the API returns an array of routes
  }

  async after(request, response) {
    // Todas as rotas necessários do usuários
  }

  static getInstance() {
    if (!CIRoute.instance) {
      CIRoute.instance = new CIRoute();
    }
    return CIRoute.instance;
  }
}

export default CIRoute;