
fetchAndSetData('/api/hero/list', {
    id: 'hero-id',
    title: 'hero-title',
    sub_title: 'hero-sub-title',
    description: 'hero-description',

    image: {
        id: 'hero-image-preview',
        type: 'image',
        path: 'admin/assets/img/hero'
    }
});

// HERO CREATE/UPDATE SCRIPT
function submitHero() {
    alert('test hero function');
    die();
    const heroId = $('#hero-id').val() || '';
    const title = $('#hero-title').val();
    const subTitle = $('#hero-sub-title').val();
    const description = $('#hero-description').val();
    const image = $('#hero-image')[0].files[0];

    if (title.length === 0) {
        errorToast("Title is required");
        return;
    }

    const isUpdate = heroId.length > 0;

    showLoader();
    const formData = new FormData();
    formData.append('title', title);
    formData.append('sub_title', subTitle);
    formData.append('description', description);
    if (image) {
        formData.append('image', image);
    }
    if (isUpdate) {
        formData.append('hero_id', heroId);
    }

    $.ajax({
        url: isUpdate ? '/api/hero/update' : '/api/hero/store',
        type: isUpdate ? 'PUT' : 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            hideLoader();
            if (result.status === 'success') {
                successToast(result.message);
                setTimeout(function () {
                    window.location.href = '/admin/hero';
                }, 1000);
            } else {
                errorToast(result.message);
            }
        },
        error: function (xhr) {
            hideLoader();
            const status = xhr.status;
            const data = xhr.responseJSON;
            if (status === 422) {
                errorToast(data?.message || "Validation failed. Please check your input.");
            } else if (status === 409) {
                errorToast(data?.message || "You already have a hero. Please update your existing hero.");
            } else if (status === 401) {
                errorToast("Unauthorized. Please login again.");
            } else {
                errorToast(data?.message || data?.error || "Something went wrong");
            }
        }
    });
}

// Preview image when file is selected
document.addEventListener('DOMContentLoaded', function () {

    // Hero image preview
    const heroImageInput = document.getElementById('hero-image');

    if (heroImageInput) {

        heroImageInput.addEventListener('change', function (e) {

            const file = e.target.files[0];

            if (file) {

                const reader = new FileReader();

                reader.onload = function (event) {

                    const heroImagePreview = document.getElementById('hero-image-preview');

                    if (heroImagePreview) {
                        heroImagePreview.src = event.target.result;
                    }

                };

                reader.readAsDataURL(file);
            }
        });
    }
});