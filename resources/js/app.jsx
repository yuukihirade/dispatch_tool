import './bootstrap';
// import './calendar';
import ReactDOM from "react-dom/client";

function App() {
    return <h1>Hello World</h1>;
}

const root = ReactDOM.createRoot(document.getElementById("app"));
root.render(<App />);