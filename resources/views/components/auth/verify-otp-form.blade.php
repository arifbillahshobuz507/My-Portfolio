<div class="authentication-inner py-6">
    <!--  Two Steps Verification -->
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
            <h4 class="mb-1">Verify your identity 🔑</h4>
            <p class="mb-6">Please enter the 6-digit code sent to your email</p>
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
                    <a href="#"> Resend </a>
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