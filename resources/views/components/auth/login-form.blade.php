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
      <h4 class="mb-1">Unlock your world 🔓</h4>
      <p class="mb-6">Enter your credentials and let's get started</p>

      <div class="mb-6 form-control-validation">
        <label for="email" class="form-label">Email<span style="color:red;">*</span></label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
      </div>
      <div class="mb-6 form-password-toggle form-control-validation">
        <label class="form-label" for="password">Password<span style="color:red;">*</span></label>
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
      <button class="btn btn-primary d-grid w-100" onclick="SubmitLogin()">Sign In</button>
    </div>

    <div class="text-center mt-2">
    <a href="{{ route('send-otp') }}" class="text-muted small d-block mb-2">
       <span style="color: red;"> Forgot password?</span>
    </a>
    <span>Don't have an account?</span>
    <a href="{{ route('registration') }}">
        <span style="color:red;">Create an account</span>
    </a>
</div
  </div>
  <!-- Register Card -->
</div>