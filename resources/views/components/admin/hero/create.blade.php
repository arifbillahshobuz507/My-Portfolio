 <div class="container-xxl flex-grow-1 container-p-y">
   <div class="app-ecommerce">
     <!-- Header -->
     <div
       class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
       <div class="d-flex flex-column justify-content-center">
         <h4 class="mb-1" id="heroPageTitle">Add a new Hero</h4>
         <p class="mb-0 text-body-secondary" id="heroPageSubtitle">Create the hero section shown on the frontend</p>
       </div>
       <div class="d-flex align-content-center flex-wrap gap-4">
         <a href="{{ route('admin.hero.list') }}" class="btn btn-label-secondary">Cancel</a>
         <button type="button" class="btn btn-primary" id="heroSubmitBtn" onclick="submitHero()">Publish Hero</button>
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
             <input type="hidden" id="heroId" value="" />
             <div class="mb-6">
               <label class="form-label" for="heroTitle">Title</label>
               <input
                 type="text"
                 class="form-control"
                 id="heroTitle"
                 placeholder="Web Developer + UX Designer"
                 name="title"
                 aria-label="Hero title" />
             </div>
             <div class="mb-6">
               <label class="form-label" for="heroSubTitle">Sub Title</label>
               <input
                 type="text"
                 class="form-control"
                 id="heroSubTitle"
                 placeholder="I am Arif Billah Shobuz"
                 name="sub_title"
                 aria-label="Hero sub title" />
             </div>
             <div>
               <label class="form-label" for="heroDescription">Description</label>
               <textarea
                 class="form-control"
                 id="heroDescription"
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
                 id="heroImagePreview"
                 src="{{ asset('admin/assets/') }}/img/avatars/1.png"
                 alt="Hero image preview"
                 class="rounded mb-4 w-100"
                 style="max-height: 220px; object-fit: cover;" />
               <div class="button-wrapper">
                 <label
                   for="heroImage"
                   class="btn btn-primary me-2 mb-2 waves-effect waves-light"
                   tabindex="0">
                   <span class="d-none d-sm-block">Upload image</span>
                   <i class="icon-base ti tabler-upload d-block d-sm-none"></i>
                   <input
                     type="file"
                     id="heroImage"
                     class="account-file-input"
                     hidden
                     accept="image/jpg, image/jpeg, image/png, image/svg+xml, image/webp" />
                 </label>
                 <button type="button" id="heroImageReset" class="btn btn-label-secondary mb-2 waves-effect">
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
