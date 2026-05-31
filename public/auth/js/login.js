
async function SubmitLogin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email.length === 0) {
        errorToast("Email is Required");
    } else if (password.length === 0) {
        errorToast("Password is Required sfasdfasfasdfdasfdasfasdfdsfasdfsadfasdfasd");
    } else if (password.length < 8 || password.length > 300) {
        if (password.length < 8) {
            errorToast('Password must be at least 8 characters long');
        } else {
            errorToast('Password must not exceed 300 characters');
        }
    } else if (!emailRegex.test(email)) {
        errorToast('Please enter a valid email address.');
    } else {
        showLoader();
        let result = await axios.post("/user-login", {
            email: email,
            password: password
        });
        hideLoader();
        if (result.data['status'] === 'success') {
            successToast(result.data['message']);
            setTimeout(function () {
                window.location.href = "/"
            }, 2000)
        } else if (result.data['message'] === 'unauthorized') {
            console.log(result.data['message']);
            errorToast(result.data['message']);
        }
    }
}