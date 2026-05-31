<div class="authentication-inner py-6">
    <!-- Register Card -->
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
            <h4 class="mb-1">Let's get you started 🚀</h4>
            <p class="mb-6">Fill in your details and become part of our family</p>

            <div class="mb-6">
                <div class="mb-6 form-control-validation">
                    <label for="title" class="form-label">Title </label>
                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        placeholder="Enter your Title"
                        autofocus />
                </div>
                <div class="mb-6 form-control-validation">
                    <label for="email" class="form-label">Email<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>
                <div class="mb-6 form-control-validation">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" class="form-control" id="number" name="number" placeholder="Enter Your Phone Number" />
                </div>
                <div class="mb-6 form-password-toggle form-control-validation">
                    <label class="form-label" for="password">Password <span style="color:red;">*</span></label>
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
                <button class="btn btn-primary d-grid w-100" onclick="onRegistration()">Sign up</button>
            </div>

            <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                    <span style="color:red;">Sign in instead</span>
                </a>
            </p>
        </div>
    </div>
    <!-- Register Card -->
</div>