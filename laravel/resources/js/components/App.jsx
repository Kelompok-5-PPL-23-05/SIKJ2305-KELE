import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return (
        <div style={{ textAlign: 'center', marginTop: '50px' }}>
            <h1>React.js sudah berhasil diinstall! 🎉</h1>
            <p>Laravel + React.js siap digunakan.</p>
        </div>
    );
}

const root = document.getElementById('app');
if (root) {
    ReactDOM.createRoot(root).render(<App />);
}

export default App;
