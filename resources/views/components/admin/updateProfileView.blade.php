<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-6">
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-6">
                        <img id="profileImage" src="{{ asset('admin/assets/') }}/img/avatars/1.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded">
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-3 mb-4 waves-effect waves-light" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="icon-base ti tabler-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg">
                            </label>
                            <button type="button" class="btn btn-label-secondary profile-reset mb-4 waves-effect">
                                <i class="icon-base ti tabler-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-4">
                    <div class="row gy-4 gx-6 mb-6">
                        <div class="col-md-6 form-control-validation">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input class="form-control" type="text" id="fullName" placeholder="John" autofocus />
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" placeholder="john.doe@example.com" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="organization" class="form-label">Organization</label>
                            <input type="text" class="form-control" id="organization" placeholder="Organization" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+88 </span>
                                <input type="text" id="phone" class="form-control" placeholder="01900000000" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" />
                        </div>
                        <div class="col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input class="form-control" type="text" id="state" placeholder="California" />
                        </div>
                        <div class="col-md-6">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" placeholder="231465" maxlength="6" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="country">Country</label>
                            <select id="country" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="language" class="form-label">Language</label>
                            <select id="language" class="select2 form-select">
                                <option value="">Select Language</option>
                                <option value="en">English</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                                <option value="pt">Portuguese</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input class="form-control" type="text" id="facebook" placeholder="https://www.facebook.com/" />
                        </div>
                        <div class="col-md-6">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input class="form-control" type="text" id="instagram" placeholder="https://www.instagram.com/" />
                        </div>
                        <div class="col-md-6">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input class="form-control" type="text" id="linkedin" placeholder="https://www.linkedin.com/" />
                        </div>
                        <div class="col-md-6">
                            <label for="github" class="form-label">GitHub</label>
                            <input class="form-control" type="text" id="github" placeholder="https://www.github.com/" />
                        </div>
                        <div class="col-md-6">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input class="form-control" type="text" id="twitter" placeholder="https://www.twitter.com/" />
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description/Bio</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Tell us about yourself..."></textarea>
                        </div>
                    </div>

                    <!-- Logo and CV Upload Section -->
                    <div class="row mt-5">
                        <!-- Logo Upload Section -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Company Logo</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-6">
                                        <img id="companyLogoPreview" src="{{ asset('admin/assets/') }}/img/avatars/1.png" alt="Company Logo" class="d-block w-px-100 h-px-100 rounded" style="object-fit: cover;">
                                        <div class="button-wrapper">
                                            <label for="companyLogoInput" class="btn btn-primary me-3 mb-4 waves-effect waves-light" tabindex="0">
                                                <span class="d-none d-sm-block">Upload Logo</span>
                                                <i class="icon-base ti tabler-upload d-block d-sm-none"></i>
                                                <input type="file" id="companyLogoInput" class="account-file-input" hidden accept="image/png, image/jpeg, image/jpg">
                                            </label>
                                            <button type="button" class="btn btn-label-secondary companyLogoReset mb-4 waves-effect">
                                                <i class="icon-base ti tabler-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>
                                            <div class="text-muted small">Allowed JPG, PNG. Max size: 800KB</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CV Upload Section -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">CV / Resume</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-6">

                                        <iframe
                                            id="userCVPreview"
                                            src=""
                                            width="120"
                                            height="150"
                                            style="border:1px solid #ddd; border-radius:8px;">
                                        </iframe>

                                        <div class="button-wrapper">
                                            <label for="userCVInput" class="btn btn-primary me-3 mb-4 waves-effect waves-light" tabindex="0">
                                                <span class="d-none d-sm-block">Upload CV</span>
                                                <i class="icon-base ti tabler-upload d-block d-sm-none"></i>

                                                <input
                                                    type="file"
                                                    id="userCVInput"
                                                    hidden
                                                    accept="application/pdf">
                                            </label>

                                            <button type="button" class="btn btn-label-secondary userCVReset mb-4 waves-effect">
                                                <i class="icon-base ti tabler-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>

                                            <div class="text-muted small">
                                                Allowed PDF only. Max size: 2MB
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-3" onclick="updateUserData()">Save changes</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </div>
                <!-- /Account -->
            </div>

            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-6 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check my-8">
                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account" disabled>
                            Deactivate Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>