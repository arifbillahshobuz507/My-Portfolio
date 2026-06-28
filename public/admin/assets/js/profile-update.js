// FETCH USER DATA SCRIPT
async function profileData() {
    // Form input fields
    const fullNameInput = document.getElementById("fullName");
    const emailInput = document.getElementById("email");
    const phoneNumberInput = document.getElementById("phoneNumber");
    const organizationInput = document.getElementById("organization");
    const addressInput = document.getElementById("address");
    const stateInput = document.getElementById("state");
    const zipCodeInput = document.getElementById("zipCode");
    const countrySelect = document.getElementById("country");
    const languageSelect = document.getElementById("language");
    const facebookInput = document.getElementById("facebook");
    const instagramInput = document.getElementById("instagram");
    const linkedinInput = document.getElementById("linkedin");
    const githubInput = document.getElementById("github");
    const twitterInput = document.getElementById("twitter");
    const descriptionInput = document.getElementById("description");
    const profileCvInput = document.getElementById("profileCv");
    const profileProfileImageInput = document.getElementById("profileImage");

    try {
        const result = await axios.get('/api/user-profile');
        // console.log("result", result);        
        const userData = result.data.data;
        if (userData) {
            // full name 
            if (userData.title && fullNameInput) {
                fullNameInput.value = userData.title || '';
            }
            // email
            if (userData.email && emailInput) {
                emailInput.value = userData.email || '';
            }
            // phone number
            if (userData.phone && phoneNumberInput) {
                phoneNumberInput.value = userData.phone || '';
            }
        }
        // Populate profile information
        const userProfile = result.data.data.profile;
        if (userProfile) {
            if (userProfile.organization && organizationInput) {
                organizationInput.value = userProfile.organization || '';
            }
            if (userProfile.address && addressInput) {
                addressInput.value = userProfile.address || '';
            }
            if (userProfile.state && stateInput) {
                stateInput.value = userProfile.state || '';
            }
            if (userProfile.zip && zipCodeInput) {
                zipCodeInput.value = userProfile.zip || '';
            }
            if (userProfile.country && countrySelect) {
                countrySelect.value = userProfile.country;
            }
            if (userProfile.language && languageSelect) {
                languageSelect.value = userProfile.language;
            }
            if (userProfile.description && descriptionInput) {
                descriptionInput.value = userProfile.description || '';
            }
            // Social media links
            if (userProfile.facebook && facebookInput) {
                facebookInput.value = userProfile.facebook || '';
            }
            if (userProfile.instagram && instagramInput) {
                instagramInput.value = userProfile.instagram || '';
            }
            if (userProfile.linkedin && linkedinInput) {
                linkedinInput.value = userProfile.linkedin || '';
            }
            if (userProfile.github && githubInput) {
                githubInput.value = userProfile.github || '';
            }
            if (userProfile.twitter && twitterInput) {
                twitterInput.value = userProfile.twitter || '';
            }
            // Set images
            const image = userProfile.image;
            const logo = userProfile.logo;

            if (userImage && image) {
                userImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${image}`;
            }
            if (userLogo && logo) {
                userLogo.src = `http://127.0.0.1:8000/admin/assets/img/profile/${logo}`;
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
    const fullName = document.getElementById("fullName").value;
    const email = document.getElementById("email").value;
    const phoneNumber = document.getElementById("phoneNumber").value;
    const organization = document.getElementById("organization").value;
    const address = document.getElementById("address").value;
    const state = document.getElementById("state").value;
    const zipCode = document.getElementById("zipCode").value;
    const country = document.getElementById("country").value;
    const language = document.getElementById("language").value;
    const facebook = document.getElementById("facebook").value;
    const instagram = document.getElementById("instagram").value;
    const linkedin = document.getElementById("linkedin").value;
    const github = document.getElementById("github").value;
    const twitter = document.getElementById("twitter").value;
    const description = document.getElementById("description").value;

    // Get file inputs
    const profileImage = document.getElementById("profileProfileImage").files[0];
    const profileLogo = document.getElementById("profileLogo").files[0];
    const profileCv = document.getElementById("profileCv").files[0];
    // Basic validation
    if (!email) {
        errorToast('Email is required');
        return false;
    }
    // Validate email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorToast('Please enter a valid email address.');
        return false;
    }

    // Append all data to FormData
    formData.append('fullName', fullName);
    formData.append('email', email);
    formData.append('phoneNumber', phoneNumber);
    formData.append('organization', organization);
    formData.append('address', address);
    formData.append('state', state);
    formData.append('zipCode', zipCode);
    formData.append('country', country);
    formData.append('language', language);
    formData.append('facebook', facebook);
    formData.append('instagram', instagram);
    formData.append('linkedin', linkedin);
    formData.append('github', github);
    formData.append('twitter', twitter);
    formData.append('description', description);

    // Append files if they exist
    if (profileImage) {
        formData.append('profileImage', profileImage);
    }
    if (profileLogo) {
        formData.append('profileLogo', profileLogo);
    }
    if (profileCv) {
        formData.append('profileCv', profileCv);
    }

    try {
        // Show loading state
        const submitBtn = document.querySelector('.btn-primary[onclick="updateUserData()"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Saving...';
        submitBtn.disabled = true;

        // Send update request
        const response = await axios({
            method: 'post', // or 'put'
            url: '/api/user-profile/update', // Update this URL to match your route
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data',
                // Add authorization header if needed
                // 'Authorization': `Bearer ${token}`
            }
        });

        // Handle success
        if (response.data.status === 'success' || response.status === 200) {
            showAlert('success', 'Profile updated successfully!');

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
        console.error('Error updating profile:', error);

        // Handle validation errors
        if (error.response && error.response.status === 422) {
            const errors = error.response.data.errors;
            let errorMessage = 'Please fix the following errors:\n';
            for (let key in errors) {
                if (errors.hasOwnProperty(key)) {
                    errorMessage += `- ${errors[key].join(', ')}\n`;
                }
            }
            showAlert('error', errorMessage);
        } else if (error.response && error.response.data && error.response.data.message) {
            showAlert('error', error.response.data.message);
        } else {
            showAlert('error', 'An error occurred while updating profile. Please try again.');
        }

        return false;
    } finally {
        // Reset button state
        const submitBtn = document.querySelector('.btn-primary[onclick="updateUserData()"]');
        if (submitBtn) {
            submitBtn.innerHTML = 'Save changes';
            submitBtn.disabled = false;
        }
    }
}

// Helper function to show alerts
function showAlert(type, message) {
    // Remove existing alerts
    const existingAlerts = document.querySelectorAll('.custom-alert');
    existingAlerts.forEach(alert => alert.remove());

    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `custom-alert alert alert-${type} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    // Insert alert at the top of the card
    const cardBody = document.querySelector('.card-body');
    if (cardBody) {
        cardBody.insertBefore(alertDiv, cardBody.firstChild);
    }

    // Auto-remove alert after 5 seconds
    setTimeout(() => {
        if (alertDiv && alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
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