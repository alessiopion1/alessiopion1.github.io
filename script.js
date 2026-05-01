// --- GESTIONE GALLERIA (LIGHTBOX) ---
let currentImgIndex = 0;
const images = document.querySelectorAll('.galleria img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');

function openLightbox(index) {
    currentImgIndex = index;
    if (images[currentImgIndex]) {
        lightboxImg.src = images[currentImgIndex].src;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeLightbox() {
    if (lightbox) {
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
}

function changeSlide(direction) {
    currentImgIndex += direction;
    if (currentImgIndex >= images.length) currentImgIndex = 0;
    if (currentImgIndex < 0) currentImgIndex = images.length - 1;
    lightboxImg.src = images[currentImgIndex].src;
}

// --- GESTIONE SLIDER CAMERE ---
let currentRoomIndex = 0;

function moveRoom(direction) {
    const rooms = document.querySelectorAll('.card-noleggi-slide');
    
    if (rooms.length === 0) return; // Evita errori se non ci sono camere

    // 1. Rimuove la classe attiva dalla camera corrente
    rooms[currentRoomIndex].classList.remove('active');
    
    // 2. Calcola il nuovo indice con gestione loop
    currentRoomIndex += direction;
    
    if (currentRoomIndex >= rooms.length) currentRoomIndex = 0;
    if (currentRoomIndex < 0) currentRoomIndex = rooms.length - 1;
    
    // 3. Aggiunge la classe attiva alla nuova camera
    rooms[currentRoomIndex].classList.add('active');
}


