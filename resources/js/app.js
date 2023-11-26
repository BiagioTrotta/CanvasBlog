import './bootstrap';
import 'bootstrap';

// Funzione per il toggle della classe sul body
function toggleBackgroundColor() {
    document.body.classList.toggle('dark-mode');
    // Salva lo stato della modalità scura nello storage locale
    const isDarkMode = document.body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDarkMode);
  }

  // Carica lo stato della modalità scura al caricamento della pagina
  document.addEventListener('DOMContentLoaded', function () {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    if (isDarkMode) {
      document.body.classList.add('dark-mode');
    }
  });

  // Aggiungi un event listener al cambio di stato del radio button group
  document.querySelectorAll('.btn-check').forEach(function (radio) {
    radio.addEventListener('change', toggleBackgroundColor);
  });