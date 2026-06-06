async function profileData() {
    const userName = document.getElementById("userName");
    const userFullName = document.getElementById("userFullName");
    const userPhone = document.getElementById("userPhone");
    const userEmail = document.getElementById("userEmail");
    
    try {
        const result = await axios.get('api/user-profile'); 
        console.log(result); 
        
        // The user data is in result.data.data based on your response
        const userData = result.data.data;
        
        // Set the values from the API response
        if (userName && userData) {
            userName.innerHTML = userData.title;
        }
        if (userFullName && userData) {
            userFullName.textContent = userData.title; 
        }
           if (userPhone && userData) {
            userPhone.textContent = userData.phone; 
        }
           if (userFullName && userData) {
            userEmail.textContent = userData.email; 
        }
        
    } catch (error) {
        console.log("Full error object:", error);

        if (error.response) {
            const status = error.response.status;
            const data = error.response.data;

            console.log("Status:", status);
            console.log("Response data:", data);

            if (status === 500) {
                if (data && data.message) {
                    errorToast(data.message);
                } else if (data && data.error) {
                    errorToast(data.error);
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