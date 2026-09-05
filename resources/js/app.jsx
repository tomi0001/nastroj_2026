import { createRoot } from 'react-dom/client';

// Wyczyść istniejącą zawartość HTML
document.body.innerHTML = '<div id="app"></div>';

// Zamiast niej wyrenderuj swój komponent reactowy
const root = createRoot(document.getElementById('app'));
root.render(<h1>Witaj, świhjmhjecie!</h1>);
