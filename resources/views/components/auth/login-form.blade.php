<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4>SIGN IN</h4>
                    <br />
                    <input id="email" placeholder="User Email" class="form-control" type="email" />
                    <br />
                    <input id="password" placeholder="User Password" class="form-control" type="password" />
                    <br />
                    <button onclick="SubmitLogin()" class="btn w-100 bg-gradient-primary">Next</button>
                    <hr />
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="javascript:history.back()">Sign Up </a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="javascript:history.back()">Forget Password</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        if (email.length === 0) {
            errorToast("Email is Requred");
        } else if (password.length === 0) {
            errorToast("Password is Requred");
        } else {
            showLoader();
            let result = await axios.post("/user-login", {
                email:email,
                password:password
            });
            hideLoader();
            if (result.data['status'] === 'success') {
                successToast(result.data['message']);
                setTimeout(function (){
                    window.location.href = "/"
                },2000)
            }else if(result.data['message']==='unauthorized'){
                console.log(result.data['message']);
                errorToast(result.data['message']);
            }
        }
    }
</script>
