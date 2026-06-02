<div class="authentication-inner py-6">
    <!-- Two Steps Verification -->
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
            <form id="twoStepsForm" action="javascript:void(0);" method="POST">
                @csrf
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
                    <!-- Hidden field for OTP -->
                    <input type="hidden" name="otp" id="otp" />
                </div>
                <button type="button" class="btn btn-primary d-grid w-100 mb-6" onclick="VerifyOtp()">Verify Otp</button>
                <div class="text-center">
                    Didn't get the code?
                    <a href="javascript:void(0);" onclick="resendOtp()"> <span style="color: red;">Resend</span> </a>
                </div>
            </form>
        </div>
    </div>
    <!-- / Two Steps Verification -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.numeral-mask');

        // OTP আপডেট করার ফাংশন
        function updateOtpInput() {
            let otpValue = '';
            inputs.forEach(input => {
                otpValue += input.value;
            });
            const otpField = document.getElementById('otp');
            if (otpField) {
                otpField.value = otpValue;
            }
        }

        // প্রতিটি ইনপুটের জন্য ইভেন্ট লিসেনার
        inputs.forEach((input, index) => {
            // টাইপ বা পেস্ট করার সময়
            input.addEventListener('input', function(e) {
                let value = e.target.value;

                // শুধু সংখ্যা অনুমোদন
                value = value.replace(/\D/g, '');

                if (value.length > 1) {
                    // একসাথে একাধিক সংখ্যা এলে (পেস্ট বা সরাসরি টাইপ)
                    const numbers = value.split('');
                    for (let i = 0; i < numbers.length && index + i < inputs.length; i++) {
                        inputs[index + i].value = numbers[i];
                    }
                    // কার্সর পরবর্তী ফিল্ডে নিয়ে যান
                    const nextIndex = index + numbers.length;
                    if (nextIndex < inputs.length) {
                        inputs[nextIndex].focus();
                    } else {
                        inputs[inputs.length - 1].focus();
                    }
                } else if (value.length === 1) {
                    // একটি সংখ্যা এলে পরবর্তী ফিল্ডে যান
                    input.value = value;
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                } else {
                    input.value = '';
                }

                updateOtpInput();
            });

            // ব্যাকস্পেস হ্যান্ডলিং
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace') {
                    if (input.value === '' && index > 0) {
                        inputs[index - 1].focus();
                        inputs[index - 1].value = '';
                    } else if (input.value !== '') {
                        input.value = '';
                    }
                    e.preventDefault();
                    updateOtpInput();
                }

                // Left arrow key
                if (e.key === 'ArrowLeft' && index > 0) {
                    inputs[index - 1].focus();
                }

                // Right arrow key
                if (e.key === 'ArrowRight' && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            // পেস্ট ইভেন্ট বিশেষ হ্যান্ডলিং
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = (e.clipboardData || window.clipboardData).getData('text');
                const numbers = pasteData.replace(/\D/g, '').split('');

                // প্রথম ৬টি সংখ্যা নিন
                const otpNumbers = numbers.slice(0, 6);

                // সব ফিল্ড খালি করুন
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].value = '';
                }

                // নতুন মান সেট করুন
                for (let i = 0; i < otpNumbers.length && i < inputs.length; i++) {
                    inputs[i].value = otpNumbers[i];
                }

                // শেষ ফিল্ডে ফোকাস করুন অথবা পরবর্তী খালি ফিল্ডে
                if (otpNumbers.length === 6) {
                    inputs[5].focus();
                } else if (otpNumbers.length < 6) {
                    inputs[otpNumbers.length].focus();
                }

                updateOtpInput();
            });

            // ফোকাস লস্টে আপডেট নিশ্চিত করুন
            input.addEventListener('blur', function() {
                updateOtpInput();
            });
        });

        // প্রাথমিক OTP মান সেট করুন
        updateOtpInput();
    });

    // Verify OTP Function
    async function VerifyOtp() {
        let otp = document.getElementById('otp').value;

        if (otp.length === 0) {
            errorToast('OTP required');
            return;
        } else if (otp.length !== 6) {
            errorToast("OTP must be 6 characters");
            return;
        }

        try {
            showLoader();
            let res = await axios.post("/api/verify-otp", {
                otp: otp,
                email: sessionStorage.getItem('email')
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '/reset-password';
                }, 1000);
            } else {
                errorToast(res.data['message']);
            }
        } catch (error) {
            hideLoader();
            if (error.response) {
                const status = error.response.status;
                const data = error.response.data;

                if (status === 500) {
                    if (data && data.message) {
                        errorToast(data.message);
                    } else if (data && data.error) {
                        errorToast(data.error);
                    } else {
                        errorToast("Server error. Please try again later.");
                    }
                } else if (status === 404) {
                    errorToast("API endpoint not found");
                } else {
                    errorToast(data?.message || data?.error || "Something went wrong");
                }
            } else {
                errorToast("Network error. Please check your connection.");
            }
        }
    }

    // Resend OTP Function
    async function resendOtp() {
        let email = sessionStorage.getItem('email');

        if (!email) {
            errorToast('Email not found. Please login again.');
            return;
        }

        try {
            showLoader();
            let res = await axios.post("/api/send-otp", {
                email: email
            });
            hideLoader();

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message'] || 'OTP resent successfully');
                // Clear all OTP inputs
                document.querySelectorAll('.numeral-mask').forEach(input => {
                    input.value = '';
                });
                document.getElementById('otp').value = '';
                // Focus on first input
                document.querySelector('.numeral-mask').focus();
            } else {
                errorToast(res.data['message'] || 'Failed to resend OTP');
            }
        } catch (error) {
            hideLoader();
            if (error.response) {
                errorToast(error.response.data?.message || 'Failed to resend OTP');
            } else {
                errorToast('Network error. Please try again.');
            }
        }
    }

    // Toast notification functions (add these if you don't have them)
    function errorToast(message) {
        // You can replace this with your preferred toast library
        if (typeof toastr !== 'undefined') {
            toastr.error(message);
        } else {
            alert('Error: ' + message);
        }
    }

    function successToast(message) {
        // You can replace this with your preferred toast library
        if (typeof toastr !== 'undefined') {
            toastr.success(message);
        } else {
            alert('Success: ' + message);
        }
    }

    function showLoader() {
        // You can replace this with your loader implementation
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Please wait...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        } else {
            console.log('Loading...');
        }
    }

    function hideLoader() {
        // You can replace this with your loader implementation
        if (typeof Swal !== 'undefined') {
            Swal.close();
        }
    }

</script>

<style>
    /* Optional: Add some styling for better UX */
    .numeral-mask:focus {
        border-color: #7367f0;
        box-shadow: 0 0 0 0.2rem rgba(115, 103, 240, 0.25);
    }

    .numeral-mask {
        transition: all 0.2s ease;
    }

    /* Remove spinner buttons from number inputs */
    input[type="tel"]::-webkit-inner-spin-button,
    input[type="tel"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="tel"] {
        -moz-appearance: textfield;
    }
</style>