async function setNewPassword() {
    let password = document.getElementById('password').value;
    let cpassword = document.getElementById('confirm-password').value;
    if (password.length === 0) {
        errorToast('Password is required');
    } else if (password.length < 8 || password.length > 300) {
        if (password.length < 8) {
            errorToast('Password must be at least 8 characters long');
        } else {
            errorToast('Password must not exceed 300 characters');
        }
    } else if (cpassword.length === 0) {
        errorToast('Confirm Password is required')
    } else if (cpassword.length < 8 || cpassword.length > 300) {
        if (password.length < 8) {
            errorToast('Confirm Password must be at least 8 characters long');
        } else {
            errorToast('Confirm Password must not exceed 50 characters');
        }
    } else if (password !== cpassword) {
        errorToast('Password and Confirm Password must be same')
    } else {
        try {
            showLoader()
            let res = await axios.post("/api/reset-password", {
                password: password
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function () {
                    window.location.href = "/login";
                }, 1000);
            } else {
                errorToast(res.data['message'])
            }
        } catch (error) {
            hideLoader();
            const status = error.response.status;
            const data = error.response.data;
            if (status === 500) {
                if (data && data.message) {
                    errorToast(data.message);
                } else if (data && data.error) {
                    errorToast(data.error);
                    (data && data.message)
                } else {
                    errorToast("Server error. Please try again later.");
                }
            } else if (status === 404) {
                errorToast("API endpoint not found");
            } else {
                errorToast(data?.message || data?.error || "Something went wrong");
            }
        }

    }

}