<div class="authentication-inner py-6">
    <!-- Reset Password -->
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
            <h4 class="mb-1">Reset Password 🔒</h4>
            <p class="mb-6">
                <span class="fw-medium">Your new password must be different from previously used passwords</span>
            </p>
            <form id="formAuthentication" action="auth-login-basic.html" method="GET">
                <div class="mb-6 form-password-toggle form-control-validation">
                    <label class="form-label" for="password">New Password</label>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                    </div>
                </div>
                <div class="mb-6 form-password-toggle form-control-validation">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="confirm-password"
                            class="form-control"
                            name="confirm-password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100 mb-6">Set new password</button>
                <div class="text-center">
                    <a href="auth-login-basic.html" class="d-flex justify-content-center">
                        <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                        Back to login
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- /Reset Password -->
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90 p-4">
                <div class="card-body">
                    <h4>SET NEW PASSWORD</h4>
                    <br />
                    <label>New Password</label>
                    <input id="password" placeholder="New Password" class="form-control" type="password" />
                    <br />
                    <label>Confirm Password</label>
                    <input id="cpassword" placeholder="Confirm Password" class="form-control" type="password" />
                    <br />
                    <button onclick="ResetPass()" class="btn w-100 bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function ResetPass() {
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('cpassword').value;
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
            showLoader()
            let res = await axios.post("/reset-password", {
                password: password
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = "/login";
                }, 1000);
            } else {
                errorToast(res.data['message'])
            }
        }

    }
</script> -->