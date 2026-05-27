<div class="authentication-inner py-6">
    <!--  Two Steps Verification -->
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
            <h4 class="mb-1">Two Step Verification 💬</h4>
            <p class="text-start mb-6">
                We sent a verification code to your mobile. Enter the code from the mobile in the field below.
                <span class="fw-medium d-block mt-1 text-heading">******1234</span>
            </p>
            <p class="mb-0">Type your 6 digit security code</p>
            <form id="twoStepsForm" action="index.html" method="GET">
                <div class="mb-6 form-control-validation">
                    <div class="auth-input-wrapper d-flex align-items-center justify-content-between numeral-mask-wrapper">
                        <input
                            type="tel"
                            class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 my-2"
                            maxlength="1"
                            autofocus />
                        <input
                            type="tel"
                            class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 my-2"
                            maxlength="1" />
                        <input
                            type="tel"
                            class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 my-2"
                            maxlength="1" />
                        <input
                            type="tel"
                            class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 my-2"
                            maxlength="1" />
                        <input
                            type="tel"
                            class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 my-2"
                            maxlength="1" />
                        <input
                            type="tel"
                            class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 my-2"
                            maxlength="1" />
                    </div>
                    <!-- Create a hidden field which is combined by 3 fields above -->
                    <input type="hidden" name="otp" />
                </div>
                <button class="btn btn-primary d-grid w-100 mb-6">Verify my account</button>
                <div class="text-center">
                    Didn't get the code?
                    <a href="javascript:void(0);"> Resend </a>
                </div>
            </form>
        </div>
    </div>
    <!-- / Two Steps Verification -->
</div>


      <!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90  p-4">
                <div class="card-body">
                    <h4>ENTER OTP CODE</h4>
                    <br/>
                    <label>6 Digit Code Here</label>
                    <input id="otp" placeholder="Code" class="form-control" type="text"/>
                    <br/>
                    <button onclick="VerifyOtp()"  class="btn w-100 float-end bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   async function VerifyOtp() {
        let otp = document.getElementById('otp').value;
        if(otp.length===0){
           errorToast('OTP requred')
        } else if (otp.length !== 6) {
            errorToast("otp must be 6 charecter");
        }
        else{
            showLoader();
            let res=await axios.post("/verify-otp", {
                otp: otp,
                email:sessionStorage.getItem('email')
            })
            hideLoader();
          if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message'])
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href='/reset-password'
                }, 1000);
            }
            else{
                errorToast(res.data['message'])
            }
        }
    }
</script> -->