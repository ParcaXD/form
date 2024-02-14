// Variables para controlar la navegación
let currentSection = 1;
const totalSections = 7;

// Función para mostrar la sección actual
function showSection(sectionNumber) {
    for (let i = 1; i <= totalSections; i++) {
        const section = document.getElementById(`section${i}`);
        section.style.display = i === sectionNumber ? 'block' : 'none';
    }
}

// Función para ir a la sección anterior
function prevSection() {
    if (currentSection > 1) {
        currentSection--;
        showSection(currentSection);
    }
}

// Función para ir a la siguiente sección
function nextSection() {
    if (currentSection < totalSections) {
        currentSection++;
        showSection(currentSection);
    }
}

// Función para enviar el formulario (aquí puedes agregar tu lógica de envío del formulario)
function submitForm() {
    // Agrega aquí la lógica para enviar el formulario
    alert('¡Formulario enviado con éxito!');
}
