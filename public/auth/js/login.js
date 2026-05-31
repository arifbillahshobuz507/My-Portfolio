
async function SubmitLogin() {
    let email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email.length === 0) {
        errorToast("Email is Required");
        return;
    }
    if (!emailRegex.test(email)) {
        errorToast('Please enter a valid email address.');
        return;
    }
    if (password.length === 0) {
        errorToast("Password is Required");
        return;
    }
    if (password.length < 8) {
        errorToast('Password must be at least 8 characters long');
        return;
    }
    if (password.length > 100) {
        errorToast('Password must not exceed 100 characters');
        return;
    }

    showLoader();
    try {
        let result = await axios.post("/api/user-login", {
            email: email,
            password: password
        });
        hideLoader();

        // 200 OK Response
        if (result.data['status'] === 'success') {
            successToast(result.data['message']);
            setTimeout(function () {
                window.location.href = "/";
            }, 500);
        } else {
            errorToast(result.data['message'] || 'Login failed');
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