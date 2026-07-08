async function profileData() {
    const userName = document.querySelectorAll(".user-name");
    const userEmail = document.getElementById("userEmail");
    const userImage = document.getElementById("userImage");
    const backgroundImage = document.getElementById("backgroundImage");
    const country = document.getElementById("country");
    const language = document.getElementById("language");
    const phoneNumber = document.getElementById("phone");

    try {
        const result = await axios.get('/api/user-profile');
        // console.log("result", result);

        const userData = result.data.data;
        const userProfile = result.data.data.profile;

        // console.log('user_data', userData);
        // console.log('user_profile_data', userProfile);

        if (userData && userProfile !== null) {
            if (userProfile) {
                const image = userProfile.image;
                const logo = userProfile.logo;
                const countryData = userProfile.country;
                const languageData = userProfile.language;
                const phoneData = userProfile.phone;
                if (country && countryData) {
                    country.textContent = countryData;
                }
                if (phoneNumber && phoneData) {
                    phoneNumber.textContent = phoneData;
                }
                if (language && languageData) {
                    language.textContent = languageData;
                }
                if (backgroundImage && image) {
                    backgroundImage.src = `http://127.0.0.1:8000/admin/assets/img/profile/${image}`;
                }
                if (logo) {
                    userLogo.src = `http://127.0.0.1:8000/admin/assets/img/profile/${logo}`;
                }
            }
        }

        if (userName && userData) {
            userName.forEach(element => {
                element.textContent = userData.title;
            });
        } else {
            // console.log('userName element not found or userData missing');
        }

        if (userPhone && userData) {
            userPhone.textContent = userData.phone;
        }

        if (userEmail && userData) {
            userEmail.textContent = userData.email;
        }

    } catch (error) {
        // console.log("Full error object:", error);
        if (error.response) {
            const status = error.response.status;
            const data = error.response.data;

            // console.log("Status:", status);
            // console.log("Response data:", data);

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

profileData();