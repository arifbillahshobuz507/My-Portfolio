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
            <div>
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
                <button class="btn btn-primary d-grid w-100 mb-6" onclick="setNewPassword()">Set new password</button>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="d-flex justify-content-center">
                        <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                        Back to login
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Reset Password -->
</div>