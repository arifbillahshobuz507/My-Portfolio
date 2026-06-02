async function sendOtp() {
    let email = document.getElementById('email').value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.length === 0) {
        errorToast('Please enter your email address');
    } else if (!emailRegex.test(email)) {
        errorToast('Please enter a valid email address.');
    } else {
        try {
            showLoader();
            let result = await axios.post("/api/send-otp", {
                email: email
            });
            hideLoader();
            console.log(result.data['message']);
            if (result.status === 200 && result.data['status'] === 'success') {
                successToast(result.data['message']);
                sessionStorage.setItem('email', email);
                setTimeout(function () {
                    window.location.href = '/verify-otp';
                }, 1000);
            } else {
                errorToast(result.data['message']);
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