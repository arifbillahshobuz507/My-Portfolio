async function onRegistration() {
    let email = document.getElementById('email').value;
    let title = document.getElementById('title').value;
    let mobile = document.getElementById('number').value;
    let password = document.getElementById('password').value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.length === 0) {
        errorToast('Email is required');
    } else if (password.length === 0) {
        errorToast("Password is required");
    } else if (password.length < 8 || password.length > 300) {
        if (password.length < 8) {
            errorToast('Password must be at least 8 characters long');
        } else {
            errorToast('Password must not exceed 300 characters');
        }
    } else if (!emailRegex.test(email)) {
        errorToast('Please enter a valid email address.');
    }
    else {
        try {
            showLoader();
            let result = await axios.post("/api/user-registration", { email: email, title: title, phone: mobile, password: password, });
            hideLoader();
            if (result.status === 200 && result.data['status'] === 'success') {
                successToast(result.data['message']);
                setTimeout(function () {
                    window.location.href = "/login";
                }, 500)
            } else {
                errorToast(result.data['message']);
            }
        } catch (error) {
            hideLoader();
            console.log(error)
            const status = error.response.status;
            const data = error.response.data;
            if (status === 500) {
                if (data && data.error) {
                    errorToast(data.error);
                } else if (data && data.message) {
                    errorToast(data.message);
                } else {
                    errorToast("Server error. Please try again later.");
                }
            } else if(status === 404){
                  errorToast("API endpoint not found");
            } else {
                errorToast(data?.message || data?.error || "Something went wrong");
            }
        }

    }
}