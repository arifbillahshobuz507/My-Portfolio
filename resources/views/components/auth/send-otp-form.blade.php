<div class="container">
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
</script>
