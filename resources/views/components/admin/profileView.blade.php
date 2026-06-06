<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-6">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('admin/assets/') }}/img/pages/profile-banner.png" alt="Banner image" class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img
                            src="{{ asset('admin/assets/') }}/img/avatars/1.png"
                            alt="user image"
                            class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-lg-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4 class="mb-2 mt-lg-6" id="userName">John Doe</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                                    <li class="list-inline-item d-flex gap-2 align-items-center">
                                        <i class="icon-base ti tabler-palette icon-lg"></i><span class="fw-medium">UX Designer</span>
                                    </li>
                                    <li class="list-inline-item d-flex gap-2 align-items-center">
                                        <i class="icon-base ti tabler-map-pin  icon-lg"></i><span class="fw-medium">Vatican City</span>
                                    </li>
                                    <li class="list-inline-item d-flex gap-2 align-items-center">
                                        <i class="icon-base ti tabler-calendar  icon-lg"></i><span class="fw-medium"> Joined April 2021</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary mb-1">
                                <i class="icon-base ti tabler-user-check icon-xs me-2"></i>Connected
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- Navbar pills -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="icon-base ti tabler-user-check icon-sm me-1_5"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-profile-teams.html"><i class="icon-base ti tabler-users icon-sm me-1_5"></i> Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-profile-projects.html"><i class="icon-base ti tabler-layout-grid icon-sm me-1_5"></i> Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-profile-connections.html"><i class="icon-base ti tabler-link icon-sm me-1_5"></i> Connections</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-6">
                <div class="card-body">
                    <p class="card-text text-uppercase text-body-secondary small mb-0">About</p>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-user icon-lg"></i><span class="fw-medium mx-2">Full Name:</span> <span id="userFullName">John Doe</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-check icon-lg"></i><span class="fw-medium mx-2">Status:</span>
                            <span>Active</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-crown icon-lg"></i><span class="fw-medium mx-2">Role:</span>
                            <span>Developer</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-flag icon-lg"></i><span class="fw-medium mx-2">Country:</span>
                            <span>USA</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="icon-base ti tabler-language icon-lg"></i><span class="fw-medium mx-2">Languages:</span> <span>English</span>
                        </li>
                    </ul>
                    <p class="card-text text-uppercase text-body-secondary small mb-0">Contacts</p>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-phone-call icon-lg"></i><span class="fw-medium mx-2">Contact:</span>
                            <span>(123) 456-7890</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-messages icon-lg"></i><span class="fw-medium mx-2">Skype:</span> <span>john.doe</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-mail icon-lg"></i><span class="fw-medium mx-2">Email:</span>
                            <span>john.doe@example.com</span>
                        </li>
                    </ul>
                    <p class="card-text text-uppercase text-body-secondary small mb-0">Teams</p>
                    <ul class="list-unstyled mb-0 mt-3 pt-1">
                        <li class="d-flex flex-wrap mb-4">
                            <span class="fw-medium me-2">Backend Developer</span><span>(126 Members)</span>
                        </li>
                        <li class="d-flex flex-wrap">
                            <span class="fw-medium me-2">React Developer</span><span>(98 Members)</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            <!-- <div class="card mb-6">
                <div class="card-body">
                    <p class="card-text text-uppercase text-body-secondary small">Overview</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-check icon-lg"></i><span class="fw-medium mx-2">Task Compiled:</span> <span>13.5k</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="icon-base ti tabler-layout-grid icon-lg"></i><span class="fw-medium mx-2">Projects Compiled:</span> <span>146</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="icon-base ti tabler-users icon-lg"></i><span class="fw-medium mx-2">Connections:</span> <span>897</span>
                        </li>
                    </ul>
                </div>
            </div> -->
            <!--/ Profile Overview -->
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <!-- Activity Timeline -->
            <!-- <div class="card card-action mb-6">
                      <div class="card-header align-items-center">
                          <h5 class="card-action-title mb-0">
                              <i class="icon-base ti tabler-chart-bar-popular icon-lg me-4"></i>Activity Timeline
                          </h5>
                          <div class="card-action-element">
                              <div class="dropdown">
                                  <button
                                      type="button"
                                      class="btn dropdown-toggle hide-arrow p-0 text-body-secondary"
                                      data-bs-toggle="dropdown"
                                      aria-expanded="false"></button>
                                  <ul class="dropdown-menu dropdown-menu-end">
                                      <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                                      <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                      <li>
                                          <hr class="dropdown-divider" />
                                      </li>
                                      <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="card-body pt-3">
                          <ul class="timeline mb-0">
                              <li class="timeline-item timeline-item-transparent">
                                  <span class="timeline-point timeline-point-primary"></span>
                                  <div class="timeline-event">
                                      <div class="timeline-header mb-3">
                                          <h6 class="mb-0">12 Invoices have been paid</h6>
                                          <small class="text-body-secondary">12 min ago</small>
                                      </div>
                                      <p class="mb-2">Invoices have been paid to the company</p>
                                      <div class="d-flex align-items-center mb-2">
                                          <div class="badge bg-lighter rounded d-flex align-items-center">
                                              <img src="{{ asset('admin/assets/') }}//img/icons/misc/pdf.png" alt="img" width="15" class="me-2" />
                                              <span class="h6 mb-0 text-body">invoices.pdf</span>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li class="timeline-item timeline-item-transparent">
                                  <span class="timeline-point timeline-point-success"></span>
                                  <div class="timeline-event">
                                      <div class="timeline-header mb-3">
                                          <h6 class="mb-0">Client Meeting</h6>
                                          <small class="text-body-secondary">45 min ago</small>
                                      </div>
                                      <p class="mb-2">Project meeting with john @10:15am</p>
                                      <div class="d-flex justify-content-between flex-wrap gap-2 mb-2">
                                          <div class="d-flex flex-wrap align-items-center mb-50">
                                              <div class="avatar avatar-sm me-2">
                                                  <img src="{{ asset('admin/assets/') }}/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                              </div>
                                              <div>
                                                  <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                                                  <small>CEO of Pixinvent</small>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li class="timeline-item timeline-item-transparent">
                                  <span class="timeline-point timeline-point-info"></span>
                                  <div class="timeline-event">
                                      <div class="timeline-header mb-3">
                                          <h6 class="mb-0">Create a new project for client</h6>
                                          <small class="text-body-secondary">2 Day Ago</small>
                                      </div>
                                      <p class="mb-2">6 team members in a project</p>
                                      <ul class="list-group list-group-flush">
                                          <li
                                              class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                              <div class="d-flex flex-wrap align-items-center">
                                                  <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                                                      <li
                                                          data-bs-toggle="tooltip"
                                                          data-popup="tooltip-custom"
                                                          data-bs-placement="top"
                                                          title="Vinnie Mostowy"
                                                          class="avatar pull-up">
                                                          <img class="rounded-circle" src="{{ asset('admin/assets/') }}/img/avatars/1.png" alt="Avatar" />
                                                      </li>
                                                      <li
                                                          data-bs-toggle="tooltip"
                                                          data-popup="tooltip-custom"
                                                          data-bs-placement="top"
                                                          title="Allen Rieske"
                                                          class="avatar pull-up">
                                                          <img class="rounded-circle" src="{{ asset('admin/assets/') }}/img/avatars/4.png" alt="Avatar" />
                                                      </li>
                                                      <li
                                                          data-bs-toggle="tooltip"
                                                          data-popup="tooltip-custom"
                                                          data-bs-placement="top"
                                                          title="Julee Rossignol"
                                                          class="avatar pull-up">
                                                          <img class="rounded-circle" src="{{ asset('admin/assets/') }}/img/avatars/2.png" alt="Avatar" />
                                                      </li>
                                                      <li class="avatar">
                                                          <span
                                                              class="avatar-initial rounded-circle pull-up"
                                                              data-bs-toggle="tooltip"
                                                              data-bs-placement="bottom"
                                                              title="3 more">+3</span>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div> -->
            <!--/ Activity Timeline -->
            <div class="row">
                <!-- Connections -->
                <!-- <div class="col-lg-12 col-xl-6">
                          <div class="card card-action mb-6">
                              <div class="card-header align-items-center">
                                  <h5 class="card-action-title mb-0">Connections</h5>
                                  <div class="card-action-element">
                                      <div class="dropdown">
                                          <button
                                              type="button"
                                              class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow p-0 text-body-secondary"
                                              data-bs-toggle="dropdown"
                                              aria-expanded="false">
                                              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                                          </button>
                                          <ul class="dropdown-menu dropdown-menu-end">
                                              <li><a class="dropdown-item" href="javascript:void(0);">Share connections</a></li>
                                              <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                              <li>
                                                  <hr class="dropdown-divider" />
                                              </li>
                                              <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <ul class="list-unstyled mb-0">
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img src="{{ asset('admin/assets/') }}/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">Cecilia Payne</h6>
                                                      <small>45 Connections</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <button class="btn btn-label-primary btn-icon">
                                                      <i class="icon-base ti tabler-user-check icon-22px"></i>
                                                  </button>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img src="{{ asset('admin/assets/') }}/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">Curtis Fletcher</h6>
                                                      <small>1.32k Connections</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <button class="btn btn-primary btn-icon">
                                                      <i class="icon-base ti tabler-user-x icon-22px"></i>
                                                  </button>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img src="{{ asset('admin/assets/') }}/img/avatars/10.png" alt="Avatar" class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">Alice Stone</h6>
                                                      <small>125 Connections</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <button class="btn btn-primary btn-icon">
                                                      <i class="icon-base ti tabler-user-x icon-22px"></i>
                                                  </button>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img src="{{ asset('admin/assets/') }}/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">Darrell Barnes</h6>
                                                      <small>456 Connections</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <button class="btn btn-label-primary btn-icon">
                                                      <i class="icon-base ti tabler-user-check icon-22px"></i>
                                                  </button>
                                              </div>
                                          </div>
                                      </li>

                                      <li class="mb-6">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img src="{{ asset('admin/assets/') }}/img/avatars/12.png" alt="Avatar" class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">Eugenia Moore</h6>
                                                      <small>1.2k Connections</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <button class="btn btn-label-primary btn-icon">
                                                      <i class="icon-base ti tabler-user-check icon-22px"></i>
                                                  </button>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="text-center">
                                          <a href="javascript:;">View all connections</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div> -->
                <!--/ Connections -->
                <!-- Teams -->
                <!-- <div class="col-lg-12 col-xl-6">
                          <div class="card card-action mb-6">
                              <div class="card-header align-items-center">
                                  <h5 class="card-action-title mb-0">Teams</h5>
                                  <div class="card-action-element">
                                      <div class="dropdown">
                                          <button
                                              type="button"
                                              class="btn btn-icon btn-text-secondary dropdown-toggle hide-arrow p-0"
                                              data-bs-toggle="dropdown"
                                              aria-expanded="false">
                                              <i class="icon-base ti tabler-dots-vertical  icon-md text-body-secondary"></i>
                                          </button>
                                          <ul class="dropdown-menu dropdown-menu-end">
                                              <li><a class="dropdown-item" href="javascript:void(0);">Share teams</a></li>
                                              <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                              <li>
                                                  <hr class="dropdown-divider" />
                                              </li>
                                              <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <ul class="list-unstyled mb-0">
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img
                                                          src="{{ asset('admin/assets/') }}/img/icons/brands/react-label.png"
                                                          alt="Avatar"
                                                          class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">React Developers</h6>
                                                      <small>72 Members</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img
                                                          src="{{ asset('admin/assets/') }}/img/icons/brands/support-label.png"
                                                          alt="Avatar"
                                                          class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">Support Team</h6>
                                                      <small>122 Members</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <a href="javascript:;"><span class="badge bg-label-primary">Support</span></a>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img
                                                          src="{{ asset('admin/assets/') }}/img/icons/brands/figma-label.png"
                                                          alt="Avatar"
                                                          class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">UI Designers</h6>
                                                      <small>7 Members</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <a href="javascript:;"><span class="badge bg-label-info">Designer</span></a>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="mb-4">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img
                                                          src="{{ asset('admin/assets/') }}/img/icons/brands/vue-label.png"
                                                          alt="Avatar"
                                                          class="rounded-circle" />
                                                  </div>
                                                  <div class="me-2">
                                                      <h6 class="mb-0">Vue.js Developers</h6>
                                                      <small>289 Members</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="mb-6">
                                          <div class="d-flex align-items-center">
                                              <div class="d-flex align-items-center">
                                                  <div class="avatar me-2">
                                                      <img
                                                          src="{{ asset('admin/assets/') }}/img/icons/brands/twitter-label.png"
                                                          alt="Avatar"
                                                          class="rounded-circle" />
                                                  </div>
                                                  <div class="me-w">
                                                      <h6 class="mb-0">Digital Marketing</h6>
                                                      <small>24 Members</small>
                                                  </div>
                                              </div>
                                              <div class="ms-auto">
                                                  <a href="javascript:;"><span class="badge bg-label-secondary">Marketing</span></a>
                                              </div>
                                          </div>
                                      </li>
                                      <li class="text-center">
                                          <a href="javascript:;">View all teams</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div> -->
                <!--/ Teams -->
            </div>
            <!-- Projects table -->
            <div class="card mb-6">
                <div class="mb-4">
                    <table class="table datatable-project">
                        <thead class="border-top">
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Project</th>
                                <th>Leader</th>
                                <th>Team</th>
                                <th class="w-px-200">Progress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--/ Projects table -->
        </div>
    </div>
    <!--/ User Profile Content -->
</div>