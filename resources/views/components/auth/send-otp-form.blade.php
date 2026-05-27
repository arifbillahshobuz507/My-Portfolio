<div class="authentication-inner py-6">
    <!-- Forgot Password -->
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-6">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <span class="text-primary">
                            <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                    fill="currentColor" />
                                <path
                                    opacity="0.06"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                    fill="#161616" />
                                <path
                                    opacity="0.06"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                    fill="#161616" />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                    </span>
                    <span class="app-brand-text demo text-heading fw-bold">Vuexy</span>
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1">Forgot Password? 🔒</h4>
            <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
            <form id="formAuthentication" class="mb-6" action="auth-reset-password-basic.html" method="GET">
                <div class="mb-6 form-control-validation">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        autofocus />
                </div>
                <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
            </form>
            <div class="text-center">
                <a href="auth-login-basic.html" class="d-flex justify-content-center">
                    <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                    Back to login
                </a>
            </div>
        </div>
    </div>
    <!-- /Forgot Password -->
</div>
        <!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90  p-4">
                <div class="card-body">
                    <h4>EMAIL ADDRESS</h4>
                    <br />
                    <label>Your email address</label>
                    <input id="email" placeholder="User Email" class="form-control" type="email" />
                    <br />
                    <button onclick="VerifyEmail()" class="btn w-100 float-end bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function VerifyEmail() {
        let email = document.getElementById('email').value;
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(email.length === 0) {
            errorToast('Please enter your email address');
        } else if (!emailRegex.test(email)) {
            errorToast('Please enter a valid email address.');
        } else {
            showLoader();
            let result = await axios.post("/send-otp", {
                email: email
            });
            hideLoader();
            console.log(result.data['message']);
            if (result.status === 200 && result.data['status'] === 'success') {
                successToast(result.data['message']);
                sessionStorage.setItem('email',email);
                setTimeout(function() {
                    window.location.href = '/verify-otp';
                }, 1000);
            } else {
                errorToast(result.data['message']);
            }
        }
    }
</script> -->