// LoginServices.js
import axios from "axios";

const LoginServices = {
  async login(formData) {
    return await axios.post('http://localhost:8000/api/login', formData)
     .then(response => {
        if (response.data) {
          console.log(response);
          return response.data; // return the response data
        } else {
          return('Invalid response from server');
        }
      })
     .catch(error => {
        if (error) {
          return(error.response.statusText)
        } else {
          return('An error occurred: ', error.message);
        }
      });
  },
};

export default LoginServices;