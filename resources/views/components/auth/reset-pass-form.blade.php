<div class="authentication-inner py-6">
    <!-- Reset Password -->
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
            <h4 class="mb-1">Set a strong password 💪</h4>
            <p class="mb-6">Create a password that's hard to guess but easy to remember</p>
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