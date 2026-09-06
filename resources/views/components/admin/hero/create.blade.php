 <div class="container-xxl flex-grow-1 container-p-y">
   <div class="app-ecommerce">
     <!-- Header -->
     <div
       class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
       <div class="d-flex flex-column justify-content-center">
         <h4 class="mb-1" id="heroPageTitle">Hero Management System</h4>
         <p class="mb-0 text-body-secondary" id="heroPageSubtitle">Create or update the hero section shown on the frontend</p>
       </div>
       <div class="d-flex align-content-center flex-wrap gap-4">
         <button type="button" id="heroSubmitBtn" class="btn btn-primary" id="heroSubmitBtn" onclick="submitHero()">Create Hero</button>
       </div>
     </div>
     <div class="row">
       <!-- First column -->
       <div class="col-12 col-lg-8">
         <!-- Hero Information -->
         <div class="card mb-6">
           <div class="card-header">
             <h5 class="card-title mb-0">Hero information</h5>
           </div>
           <div class="card-body">
             <input type="hidden" id="hero-id" value="" />
             <div class="mb-6">
               <label class="form-label" for="hero-title">Title</label>
               <input
                 type="text"
                 class="form-control"
                 id="hero-title"
                 placeholder="Software Developer"
                 name="title"
                 aria-label="Hero title" />
             </div>
             <div class="mb-6">
               <label class="form-label" for="hero-sub-title">Sub Title</label>
               <input
                 type="text"
                 class="form-control"
                 id="hero-sub-title"
                 placeholder="I am Arif Billah Shobuz"
                 name="sub_title"
                 aria-label="Hero sub title" />
             </div>
             <div>
               <label class="form-label" for="hero-description">Description</label>
               <textarea
                 class="form-control"
                 id="hero-description"
                 rows="4"
                 placeholder="Write a short description..."
                 name="description"
                 aria-label="Hero description"></textarea>
             </div>
           </div>
         </div>
       </div>
       <!-- /First column -->

       <!-- Second column -->
       <div class="col-12 col-lg-4">
         <!-- Media -->
         <div class="card mb-6">
           <div class="card-header">
             <h5 class="mb-0 card-title">Hero Image</h5>
           </div>
           <div class="card-body">
             <div class="d-flex flex-column align-items-center text-center">
               <img
                 id="hero-image-preview"
                 src="{{ asset('admin/assets/') }}/img/avatars/1.png"
                 alt="Hero image preview"
                 class="rounded mb-4 w-100"
                 style="max-height: 220px; object-fit: cover;" />
               <div class="button-wrapper">
                 <label
                   for="hero-image"
                   class="btn btn-primary me-2 mb-2 waves-effect waves-light"
                   tabindex="0">
                   <span class="d-none d-sm-block">Upload image</span>
                   <i class="icon-base ti tabler-upload d-block d-sm-none"></i>
                   <input
                     type="file"
                     id="hero-image"
                     class="account-file-input"
                     hidden
                     accept="image/jpg, image/jpeg, image/png, image/svg+xml, image/webp" />
                 </label>
                 <button type="button" id="hero-image-reset" class="btn btn-label-secondary mb-2 waves-effect">
                   <span class="d-none d-sm-block">Reset</span>
                   <i class="icon-base ti tabler-reset d-block d-sm-none"></i>
                 </button>
               </div>
               <div class="text-muted small mt-2">Allowed JPG, JPEG, PNG, SVG or WebP. Max size 2MB.</div>
             </div>
           </div>
         </div>
         <!-- /Media -->
       </div>
       <!-- /Second column -->
     </div>
   </div>
 </div>