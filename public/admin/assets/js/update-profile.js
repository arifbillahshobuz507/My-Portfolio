// Function to fetch and populate form data
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
    const userLogoInput = document.getElementById("profileLogo");
    const profileCvInput = document.getElementById("profileCv");
    const profileProfileImageInput = document.getElementById("profileProfileImage");

    try {
        const result = await axios.get('/api/user-profile');
        // console.log("result", result);        
        const userData = result.data.data;
        if(userData){            
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
        if(userProfile){
            if ( userProfile.organization && organizationInput) {
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

// // Function to update User information
// async function updateUserData(userId, formData) {
//     try {        
//         const updateData = {
//             user_id: userId,
//             title: formData.title,
//             email: formData.email,
//             phone: formData.phone,
//             password: formData.password || null
//         };

//         const response = await axios.put('/api/users/update', updateData);
        
//         if (response.data.status === 'success') {
//             // Update display elements
//             const userName = document.querySelectorAll(".user-name");
//             const userPhone = document.getElementById("userPhone");
//             const userEmail = document.getElementById("userEmail");
            
//             if (userName) {
//                 userName.forEach(element => {
//                     element.textContent = formData.title;
//                 });
//             }
//             if (userPhone) userPhone.textContent = formData.phone;
//             if (userEmail) userEmail.textContent = formData.email;
            
//              successToast('User information updated successfully!');
//             return true;
//         } else {
//            errorToast(response.data.message || 'Failed to update user');
//             return false;
//         }
//     } catch (error) {
//         if (error.response && error.response.data) {
//            errorToast(error.response.data.message || 'Error updating user');
//         } else {
//             errorToast('Network error occurred');
//         }
//         return false;
//     }
// }

// // Function to update User Profile information
// async function updateUserProfile(userId, formData, files = null) {
//     try {
//         // Create FormData object for file uploads
//         const profileFormData = new FormData();
//         profileFormData.append('user_id', userId);
//         profileFormData.append('title', formData.title || '');
//         profileFormData.append('name', formData.organization || '');
//         profileFormData.append('description', formData.description || '');
//         profileFormData.append('facebook', formData.facebook || '');
//         profileFormData.append('instagram', formData.instagram || '');
//         profileFormData.append('linkedin', formData.linkedin || '');
//         profileFormData.append('github', formData.github || '');
//         profileFormData.append('twitter', formData.twitter || '');
        
//         // Add address fields if they exist in your profile model
//         if (formData.address) profileFormData.append('address', formData.address);
//         if (formData.state) profileFormData.append('state', formData.state);
//         if (formData.zip_code) profileFormData.append('zip_code', formData.zip_code);
//         if (formData.country) profileFormData.append('country', formData.country);
//         if (formData.language) profileFormData.append('language', formData.language);
        
//         // Append files if they exist
//         if (files && files.image) {
//             profileFormData.append('image', files.image);
//         }
//         if (files && files.logo) {
//             profileFormData.append('logo', files.logo);
//         }
//         if (files && files.cv) {
//             profileFormData.append('cv', files.cv);
//         }
        
//         const response = await axios.post('/api/user-profile/store', profileFormData, {
//             headers: {
//                 'Content-Type': 'multipart/form-data'
//             }
//         });
        
//         if (response.data.status === 'success') {
//             toastr.success(response.data.message || 'Profile updated successfully!');
            
//             // Update images if new ones were uploaded
//             if (files && (files.image || files.logo)) {
//                 const userImage = document.getElementById("userImage");
//                 const userLogo = document.getElementById("userLogo");
                
//                 if (files.image && userImage && response.data.data.image) {
//                     userImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${response.data.data.image}`;
//                 }
//                 if (files.logo && userLogo && response.data.data.logo) {
//                     userLogo.src = `http://127.0.0.1:8000/admin/assets/img/profile/${response.data.data.logo}`;
//                 }
//             }
//             return true;
//         } else {
//             toastr.error(response.data.message || 'Failed to update profile');
//             return false;
//         }
//     } catch (error) {
//         console.error('Error updating profile:', error);
//         if (error.response && error.response.data) {
//             toastr.error(error.response.data.message || 'Error updating profile');
//         } else {
//             toastr.error('Network error occurred');
//         }
//         return false;
//     }
// }

// // Function to handle form submission (Save changes button)
// async function saveAllChanges() {
//     // Get user ID from somewhere (store it in a hidden field or get from API response)
//     const userId = document.getElementById("userId") ? document.getElementById("userId").value : 1; // Replace with actual user ID
    
//     // Collect form data
//     const formData = {
//         title: document.getElementById("firstName")?.value || '',
//         email: document.getElementById("email")?.value || '',
//         phone: document.getElementById("phoneNumber")?.value || '',
//         password: document.getElementById("password")?.value || null,
//         organization: document.getElementById("organization")?.value || '',
//         description: document.getElementById("description")?.value || '',
//         facebook: document.getElementById("facebook")?.value || '',
//         instagram: document.getElementById("instagram")?.value || '',
//         linkedin: document.getElementById("linkedin")?.value || '',
//         github: document.getElementById("github")?.value || '',
//         twitter: document.getElementById("twitter")?.value || '',
//         address: document.getElementById("address")?.value || '',
//         state: document.getElementById("state")?.value || '',
//         zip_code: document.getElementById("zipCode")?.value || '',
//         country: document.getElementById("country")?.value || '',
//         language: document.getElementById("language")?.value || ''
//     };
    
//     // Collect files if any
//     const imageFile = document.getElementById("profileImage")?.files[0];
//     const logoFile = document.getElementById("profileLogo")?.files[0];
//     const cvFile = document.getElementById("profileCv")?.files[0];
    
//     const files = {
//         image: imageFile,
//         logo: logoFile,
//         cv: cvFile
//     };
    
//     // Show loading state
//     const saveButton = document.querySelector('button[type="submit"]');
//     const originalText = saveButton.textContent;
//     saveButton.disabled = true;
//     saveButton.textContent = 'Saving...';
    
//     try {
//         // Update user information
//         const userUpdateSuccess = await updateUserData(userId, formData);
        
//         // Update profile information
//         const profileUpdateSuccess = await updateUserProfile(userId, formData, files);
        
//         if (userUpdateSuccess && profileUpdateSuccess) {
//             toastr.success('All changes saved successfully!');
//             // Reload data to reflect changes
//             await profileData();
//         } else if (userUpdateSuccess || profileUpdateSuccess) {
//             toastr.warning('Partial update completed. Some information may not have been saved.');
//         } else {
//             toastr.error('Failed to save changes. Please try again.');
//         }
//     } catch (error) {
//         console.error('Error saving changes:', error);
//         toastr.error('An error occurred while saving changes');
//     } finally {
//         // Reset button state
//         saveButton.disabled = false;
//         saveButton.textContent = originalText;
//     }
// }

// // Function to handle image preview before upload
// function previewImage(input, previewElementId) {
//     if (input.files && input.files[0]) {
//         const reader = new FileReader();
//         reader.onload = function(e) {
//             const preview = document.getElementById(previewElementId);
//             if (preview) {
//                 preview.src = e.target.result;
//             }
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// }

// // Add event listeners when DOM is loaded
// document.addEventListener('DOMContentLoaded', function() {
//     // Load initial data
//     profileData();
    
//     // Add event listener for save button
//     const saveButton = document.querySelector('button[type="submit"]');
//     if (saveButton) {
//         saveButton.addEventListener('click', function(e) {
//             e.preventDefault();
//             saveAllChanges();
//         });
//     }
    
//     // Add image preview listeners if image inputs exist
//     const profileImageInput = document.getElementById('profileImage');
//     const profileLogoInput = document.getElementById('profileLogo');
    
//     if (profileImageInput) {
//         profileImageInput.addEventListener('change', function() {
//             previewImage(this, 'userImage');
//         });
//     }
    
//     if (profileLogoInput) {
//         profileLogoInput.addEventListener('change', function() {
//             previewImage(this, 'userLogo');
//         });
//     }
// });