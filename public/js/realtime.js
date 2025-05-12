function openImageModal(element) {
    const imgSrc = element.querySelector('img').src;
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');

    modalImg.src = imgSrc;
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    setTimeout(() => {
        modal.querySelector('button').focus();
    }, 100);
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !document.getElementById('imageModal').classList.contains('hidden')) {
        closeImageModal();
    }
});
