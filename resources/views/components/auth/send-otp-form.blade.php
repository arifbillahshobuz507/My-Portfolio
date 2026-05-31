<div class="authentication-inner py-6">
    <!-- Forgot Password -->
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-6">
                <a href="{{ route('home') }}" class="app-brand-link">
                    <img style="border-radius: 5px;" width="32" height="22" src="{{ asset('userInterface/assets/img/hero/me.png') }}" alt="" />
                    <span class="app-brand-text demo text-heading fw-bold">{{ env("APP_NAME") ? env("APP_NAME") : "arif"}}</span>
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1">Forgot your password? 🔒</h4>
            <p class="mb-6">Don't worry! We'll send you a verification code</p>
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