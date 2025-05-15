function openPasswordResetModal() {
    const modal = document.getElementById('passwordResetModal');
    const modalContent = modal.querySelector('div');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closePasswordResetModal() {
    const modal = document.getElementById('passwordResetModal');
    const modalContent = modal.querySelector('div');
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function sendPasswordResetLink() {

    closePasswordResetModal();
    setTimeout(() => {
        openPasswordResetSuccessModal();
    }, 350);
}

function openPasswordResetSuccessModal() {
    const modal = document.getElementById('passwordResetSuccessModal');
    const modalContent = modal.querySelector('div');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closePasswordResetSuccessModal() {
    const modal = document.getElementById('passwordResetSuccessModal');
    const modalContent = modal.querySelector('div');
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function openChangePasswordModal() {
    const modal = document.getElementById('changePasswordModal');
    const modalContent = modal.querySelector('div');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeChangePasswordModal() {
    const modal = document.getElementById('changePasswordModal');
    const modalContent = modal.querySelector('div');
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

document.getElementById('passwordChangeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Password changed successfully!');
    closeChangePasswordModal();
});

function openVehiclePhotoModal() {
    const modal = document.getElementById('changeVehiclePhotoModal');
    const modalContent = modal.querySelector('div');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);

    document.getElementById('vehiclePhotoUpload').value = '';
    document.getElementById('newPhotoPreviewContainer').classList.add('hidden');
    document.getElementById('newVehiclePhotoPreview').classList.add('hidden');
    document.getElementById('saveVehiclePhotoBtn').disabled = true;
}

function closeVehiclePhotoModal() {
    const modal = document.getElementById('changeVehiclePhotoModal');
    const modalContent = modal.querySelector('div');
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function previewNewVehiclePhoto(event) {
    const input = event.target;
    const previewContainer = document.getElementById('newPhotoPreviewContainer');
    const previewImage = document.getElementById('newVehiclePhotoPreview');
    const placeholder = document.getElementById('newPhotoPlaceholder');
    const saveBtn = document.getElementById('saveVehiclePhotoBtn');

    if (input.files && input.files[0]) {
        const file = input.files[0];

        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 5MB.');
            input.value = '';
            return;
        }

        if (!file.type.match('image.*')) {
            alert('Hanya file gambar yang diperbolehkan.');
            input.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
            placeholder.classList.add('hidden');
            previewContainer.classList.remove('hidden');
            saveBtn.disabled = false;
        }

        reader.readAsDataURL(file);
    }
}

function saveVehiclePhoto() {

    const fileInput = document.getElementById('vehiclePhotoUpload');
    if (!fileInput.files || fileInput.files.length === 0) return;

    document.getElementById('saveVehiclePhotoBtn').disabled = true;
    document.getElementById('saveVehiclePhotoBtn').textContent = 'Menyimpan...';

    setTimeout(() => {
        const previewImage = document.getElementById('newVehiclePhotoPreview').src;

        document.getElementById('updatedVehiclePhoto').src = previewImage;

        closeVehiclePhotoModal();

        setTimeout(() => {
            openVehiclePhotoSuccessModal();
        }, 350);
    }, 1500);
}

function openVehiclePhotoSuccessModal() {
    const modal = document.getElementById('vehiclePhotoSuccessModal');
    const modalContent = modal.querySelector('div');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeVehiclePhotoSuccessModal() {
    const modal = document.getElementById('vehiclePhotoSuccessModal');
    const modalContent = modal.querySelector('div');
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        window.location.reload();
    }, 300);
}
function openImageModal(imageUrl) {
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('imageModal').classList.remove('hidden');
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
}
