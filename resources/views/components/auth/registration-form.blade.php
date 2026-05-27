<div class="authentication-inner py-6">
    <!-- Register Card -->
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
            <h4 class="mb-1">Adventure starts here 🚀</h4>
            <p class="mb-6">Make your app management easy and fun!</p>

            <form id="formAuthentication" class="mb-6" action="index.html" method="GET">
                <div class="mb-6 form-control-validation">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Enter your username"
                        autofocus />
                </div>
                <div class="mb-6 form-control-validation">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>
                <div class="mb-6 form-password-toggle form-control-validation">
                    <label class="form-label" for="password">Password</label>
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
                <div class="my-8 form-control-validation">
                    <div class="form-check mb-0 ms-2">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            I agree to
                            <a href="javascript:void(0);">privacy policy & terms</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
                <span>Already have an account?</span>
                <a href="auth-login-basic.html">
                    <span>Sign in instead</span>
                </a>
            </p>

            <div class="divider my-6">
                <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-facebook me-1_5">
                    <i class="icon-base ti tabler-brand-facebook-filled icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-twitter me-1_5">
                    <i class="icon-base ti tabler-brand-twitter-filled icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-github me-1_5">
                    <i class="icon-base ti tabler-brand-github-filled icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-google-plus">
                    <i class="icon-base ti tabler-brand-google-filled icon-20px"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Register Card -->
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr />
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-6 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email" />
                            </div>
                            <div class="col-md-6 p-2">
                                <label>Name</label>
                                <input id="title" placeholder="Name" class="form-control" type="text" />
                            </div>
                            <div class="col-md-6 p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile" />
                            </div>
                            <div class="col-md-6 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control"
                                    type="password" />
                            </div>
                        </div>
                        <div class="row m-0 justify-content-md-center p-0">
                            <div class="col-md-6 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  bg-gradient-primary ">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   async function onRegistration() {
        let email = document.getElementById('email').value;
        let title = document.getElementById('title').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(email.length===0){
            errorToast('Email is required');
        } else if(password.length===0){
            errorToast("Password is required");
        } else if (password.length < 8 || password.length > 300) {
            if (password.length < 8) {
                errorToast('Password must be at least 8 characters long');
            } else {
                errorToast('Password must not exceed 300 characters');
            }
        }  else if (!emailRegex.test(email)) {
            errorToast('Please enter a valid email address.');
        }
         else {
            showLoader();
            let result=await axios.post("/user-registration", {email:email,title:title, phone:mobile,password:password,});
            hideLoader();
            if(result.status===200 && result.data['status']==='success'){
                successToast(result.data['message']);
                setTimeout(function (){
                    window.location.href="/login";
                },2000)
            }else{
                errorToast(result.data['message']);
            }
        }
    }
</script> -->