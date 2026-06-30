// FETCH USER DATA SCRIPT
async function profileData() {
    const fullName = document.getElementById("fullName");
    const email = document.getElementById("email");
    const phoneNumber = document.getElementById("phoneNumber");
    const organization = document.getElementById("organization");
    const address = document.getElementById("address");
    const state = document.getElementById("state");
    const zipCode = document.getElementById("zipCode");
    const country = document.getElementById("country");
    const language = document.getElementById("language");
    const facebook = document.getElementById("facebook");
    const instagram = document.getElementById("instagram");
    const linkedin = document.getElementById("linkedin");
    const github = document.getElementById("github");
    const twitter = document.getElementById("twitter");
    const description = document.getElementById("description");
    const profileCv = document.getElementById("profileCv");
    const profileImageView = document.getElementById("profileImage");
    const profileImage = document.getElementById("upload");


    try {
        const result = await axios.get('/api/user-profile');
        console.log("result", result);
        const userData = result.data.data;
        if (userData) {
            // full name 
            if (userData.title && fullName) {
                fullName.value = userData.title || '';
            }
            // email
            if (userData.email && email) {
                email.value = userData.email || '';
            }
            // phone number
            if (userData.phone && phoneNumber) {
                phoneNumber.value = userData.phone || '';
            }
        }
        // Populate profile information
        const userProfile = result.data.data.profile;
        if (userProfile) {
            if (userProfile.organization && organization) {
                organization.value = userProfile.organization || '';
            }
            if (userProfile.address && address) {
                address.value = userProfile.address || '';
            }
            if (userProfile.state && state) {
                state.value = userProfile.state || '';
            }
            if (userProfile.zip && zipCode) {
                zipCode.value = userProfile.zip || '';
            }
            if (userProfile.country && country) {
                country.value = userProfile.country;
            }
            if (userProfile.language && language) {
                language.value = userProfile.language;
            }
            if (userProfile.description && description) {
                description.value = userProfile.description || '';
            }
            // Social media links
            if (userProfile.facebook && facebook) {
                facebook.value = userProfile.facebook || '';
            }
            if (userProfile.instagram && instagram) {
                instagram.value = userProfile.instagram || '';
            }
            if (userProfile.linkedin && linkedin) {
                linkedin.value = userProfile.linkedin || '';
            }
            if (userProfile.github && github) {
                github.value = userProfile.github || '';
            }
            if (userProfile.twitter && twitter) {
                twitter.value = userProfile.twitter || '';
            }
            // Set images
            const image = userProfile.image;
            const logo = userProfile.logo;
            const baseUrl = "{{ asset('admin/assets/img/profile') }}";

            if (profileImageView && logo) {
                profileImageView.src = `http://127.0.0.1:8000/admin/assets/img/profile/${logo}`;
            }
            if (userImage && image) {
                userImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${image}`;
            }
        }
    } catch (error) {
        console.log("Full error object:", error);
        console.error('Error fetching profile data:', error);
    }
}
profileData();


//USER UPDATE SCRIPT
async function updateUserData() {
    // Get form data
    const formData = new FormData();

    // Get all input values
    const fullNameInput = document.getElementById("fullName").value;
    const organizationInput = document.getElementById("organization").value;
    const phoneNumber = document.getElementById("phone").value;
    const addressInput = document.getElementById("address").value;
    const stateInput = document.getElementById("state").value;
    const zipCodeInput = document.getElementById("zipCode").value;
    const countryInput = document.getElementById("country").value;
    const languageInput = document.getElementById("language").value;
    const facebookInput = document.getElementById("facebook").value;
    const instagramInput = document.getElementById("instagram").value;
    const linkedinInput = document.getElementById("linkedin").value;
    const githubInput = document.getElementById("github").value;
    const twitterInput = document.getElementById("twitter").value;
    const descriptionInput = document.getElementById("description").value;

    // Get file inputs
    const profileImageInput = document.getElementById("upload").files[0];
    console.log(profileImageInput);
    const profileLogoInput = document.getElementById("profileLogo").files[0];
    const profileCvInput = document.getElementById("cv").files[0];

    // Append all data to FormData
    formData.append('title', fullNameInput);
    formData.append('organization', organizationInput);
    formData.append('phone', phoneNumber);
    formData.append('address', addressInput);
    formData.append('state', stateInput);
    formData.append('zip', zipCodeInput);
    formData.append('country', countryInput);
    formData.append('language', languageInput);
    formData.append('facebook', facebookInput);
    formData.append('instagram', instagramInput);
    formData.append('linkedin', linkedinInput);
    formData.append('github', githubInput);
    formData.append('twitter', twitterInput);
    formData.append('description', descriptionInput);

    // Append files if they exist
    if (profileImageInput) {
        formData.append('logo', profileImageInput);
    }
    if (profileLogoInput) {
        formData.append('image', profileImageInput);
    }
    if (profileCvInput) {
        formData.append('cv', profileCvInput);
    }

    try {
        // Show loading state
        // const submitBtn = document.querySelector('.btn-primary[onclick="updateUserData()"]');
        // const originalText = submitBtn.innerHTML;
        // submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Saving...';
        // submitBtn.disabled = true;

        // Send update request
        const response = await axios({
            method: 'post', // or 'put'
            url: '/api/user-profile/update',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

        // Handle success
        if (response.data.status === 'success' || response.status === 200) {
            successToast(response.data.message);

            // Update the UI with new data
            const data = response.data.data;
            if (data) {
                // Update profile images if new ones were uploaded
                const userImage = document.getElementById('uploadedAvatar');
                const userLogo = document.getElementById('profileLogoPreview'); // You may need to add this element

                if (data.profile && data.profile.image && userImage) {
                    userImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${data.profile.image}?t=${new Date().getTime()}`;
                }
                if (data.profile && data.profile.logo && userLogo) {
                    userLogo.src = `http://127.0.0.1:8000/admin/assets/img/profile/${data.profile.logo}?t=${new Date().getTime()}`;
                }
            }
        } else {
            showAlert('error', response.data.message || 'Failed to update profile');
        }

    } catch (error) {
        hideLoader();
        console.log("Full error object:", error);

        if (error.response) {
            const status = error.response.status;
            const data = error.response.data;

            console.log("Status:", status);
            console.log("Response data:", data);

            if (status === 500) {
                if (data && data.message) {
                    errorToast(data.message); // "Authentication failed"
                } else if (data && data.error) {
                    errorToast(data.error); // "Invalid email or password"
                } else {
                    errorToast("Server error. Please try again later.");
                }
            }
            else if (status === 401) {
                errorToast("Invalid email or password");
            }
            else if (status === 422) {
                errorToast("Validation failed. Please check your input.");
            }
            else if (status === 404) {
                errorToast("API endpoint not found");
            }
            else {
                errorToast(data?.message || data?.error || "Something went wrong");
            }
        }
        else if (error.request) {
            errorToast("Network error. Please check your internet connection.");
        }
        else {
            errorToast(error.message || "An unexpected error occurred");
        }
    }
}

// Preview image when file is selected
document.addEventListener('DOMContentLoaded', function () {
    // Profile image preview
    const profileImageInput = document.getElementById('profileProfileImage');
    if (profileImageInput) {
        profileImageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const avatar = document.getElementById('uploadedAvatar');
                    if (avatar) {
                        avatar.src = event.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Logo image preview (optional - you can add a preview element for logo)
    const logoInput = document.getElementById('profileLogo');
    if (logoInput) {
        logoInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    // Create or update logo preview
                    let logoPreview = document.getElementById('profileLogoPreview');
                    if (!logoPreview) {
                        logoPreview = document.createElement('img');
                        logoPreview.id = 'profileLogoPreview';
                        logoPreview.className = 'mt-2 d-block w-px-100 h-px-100 rounded';
                        logoInput.parentNode.appendChild(logoPreview);
                    }
                    logoPreview.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

// Reset image functionality
document.querySelector('.account-image-reset')?.addEventListener('click', function () {
    const avatar = document.getElementById('uploadedAvatar');
    if (avatar) {
        avatar.src = '{{ asset("admin/assets/img/avatars/1.png") }}';
    }
    const fileInput = document.getElementById('profileProfileImage');
    if (fileInput) {
        fileInput.value = '';
    }
});