import axios from "axios";
export default function Logout() {
    const handleSubmit = (event) => {
        var resultado = window.confirm("Deseja sair?");
        if (resultado === true) {
            alert('okay');
            axios.get('http://localhost:8000/api/logout')
        }
        else {
            alert("voltando....");
        }
    }
    return (
        <div beforeOuload={handleSubmit}>
        </div>
    )
}