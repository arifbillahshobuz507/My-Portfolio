 <div class="container-xxl flex-grow-1 container-p-y">
              <div class="app-ecommerce">
                <!-- Add Product -->
                <div
                  class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
                  <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1">Add a new Product</h4>
                    <p class="mb-0">Orders placed across your store</p>
                  </div>
                  <div class="d-flex align-content-center flex-wrap gap-4">
                    <div class="d-flex gap-4">
                      <button class="btn btn-label-secondary">Discard</button>
                      <button class="btn btn-label-primary">Save draft</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Publish product</button>
                  </div>
                </div>

                <div class="row">
                  <!-- First column-->
                  <div class="col-12 col-lg-8">
                    <!-- Product Information -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-tile mb-0">Product information</h5>
                      </div>
                      <div class="card-body">
                        <div class="mb-6">
                          <label class="form-label" for="ecommerce-product-name">Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="ecommerce-product-name"
                            placeholder="Product title"
                            name="productTitle"
                            aria-label="Product title" />
                        </div>
                        <div class="row mb-6">
                          <div class="col">
                            <label class="form-label" for="ecommerce-product-sku">SKU</label>
                            <input
                              type="number"
                              class="form-control"
                              id="ecommerce-product-sku"
                              placeholder="SKU"
                              name="productSku"
                              aria-label="Product SKU" />
                          </div>
                          <div class="col">
                            <label class="form-label" for="ecommerce-product-barcode">Barcode</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ecommerce-product-barcode"
                              placeholder="0123-4567"
                              name="productBarcode"
                              aria-label="Product barcode" />
                          </div>
                        </div>
                        <!-- Description -->
                        <div>
                          <label class="mb-1">Description (Optional)</label>
                          <div class="form-control p-0">
                            <div class="comment-toolbar border-0 border-bottom">
                              <div class="d-flex justify-content-start">
                                <span class="ql-formats me-0">
                                  <button class="ql-bold"></button>
                                  <button class="ql-italic"></button>
                                  <button class="ql-underline"></button>
                                  <button class="ql-list" value="ordered"></button>
                                  <button class="ql-list" value="bullet"></button>
                                  <button class="ql-link"></button>
                                  <button class="ql-image"></button>
                                </span>
                              </div>
                            </div>
                            <div class="comment-editor border-0 pb-6" id="ecommerce-category-description"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Product Information -->
                    <!-- Media -->
                    <div class="card mb-6">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Product Image</h5>
                        <a href="javascript:void(0);" class="fw-medium">Add media from URL</a>
                      </div>
                      <div class="card-body">
                        <form action="/upload" class="dropzone needsclick p-0" id="dropzone-basic">
                          <div class="dz-message needsclick">
                            <p class="h4 needsclick pt-3 mb-2">Drag and drop your image here</p>
                            <p class="h6 text-body-secondary d-block fw-normal mb-2">or</p>
                            <span class="needsclick btn btn-sm btn-label-primary" id="btnBrowse">Browse image</span>
                          </div>
                          <div class="fallback">
                            <input name="file" type="file" />
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- /Media -->
                    <!-- Variants -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-title mb-0">Variants</h5>
                      </div>
                      <div class="card-body">
                        <form class="form-repeater">
                          <div data-repeater-list="group-a">
                            <div data-repeater-item>
                              <div class="row g-sm-6 mb-6">
                                <div class="col-sm-4">
                                  <label class="form-label" for="form-repeater-1-1">Options</label>
                                  <select id="form-repeater-1-1" class="select2 form-select" data-placeholder="Size">
                                    <option value="">Size</option>
                                    <option value="size">Size</option>
                                    <option value="color">Color</option>
                                    <option value="weight">Weight</option>
                                    <option value="smell">Smell</option>
                                  </select>
                                </div>

                                <div class="col-sm-8">
                                  <label class="form-label invisible" for="form-repeater-1-2">Not visible</label>
                                  <input
                                    type="number"
                                    id="form-repeater-1-2"
                                    class="form-control"
                                    placeholder="Enter size" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div>
                            <button class="btn btn-primary" data-repeater-create>
                              <i class="icon-base ti tabler-plus icon-xs me-2"></i>
                              Add another option
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- /Variants -->
                    <!-- Inventory -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-title mb-0">Inventory</h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <!-- Navigation -->
                          <div class="col-12 col-md-4 col-xl-5 col-xxl-4 mx-auto card-separator">
                            <div class="d-flex justify-content-between flex-column mb-4 mb-md-0 pe-md-4">
                              <div class="nav-align-left">
                                <ul class="nav nav-pills flex-column w-100">
                                  <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#restock">
                                      <i class="icon-base ti tabler-box icon-sm me-1_5"></i>
                                      <span class="align-middle">Restock</span>
                                    </button>
                                  </li>
                                  <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shipping">
                                      <i class="icon-base ti tabler-car icon-sm me-1_5"></i>
                                      <span class="align-middle">Shipping</span>
                                    </button>
                                  </li>
                                  <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#global-delivery">
                                      <i class="icon-base ti tabler-world icon-sm me-1_5"></i>
                                      <span class="align-middle">Global Delivery</span>
                                    </button>
                                  </li>
                                  <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#attributes">
                                      <i class="icon-base ti tabler-link icon-sm me-1_5"></i>
                                      <span class="align-middle">Attributes</span>
                                    </button>
                                  </li>
                                  <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#advanced">
                                      <i class="icon-base ti tabler-lock icon-sm me-1_5"></i>
                                      <span class="align-middle">Advanced</span>
                                    </button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <!-- /Navigation -->
                          <!-- Options -->
                          <div class="col-12 col-md-8 col-xl-7 col-xxl-8 pt-6 pt-md-0">
                            <div class="tab-content p-0 ps-md-4">
                              <!-- Restock Tab -->
                              <div class="tab-pane fade show active" id="restock" role="tabpanel">
                                <h6 class="text-body">Options</h6>
                                <label class="form-label" for="ecommerce-product-stock">Add to Stock</label>
                                <div class="row mb-4 g-4 pe-md-4">
                                  <div class="col-12 col-sm-9">
                                    <input
                                      type="number"
                                      class="form-control"
                                      id="ecommerce-product-stock"
                                      placeholder="Quantity"
                                      name="quantity"
                                      aria-label="Quantity" />
                                  </div>
                                  <div class="col-12 col-sm-3">
                                    <button class="btn btn-primary">Confirm</button>
                                  </div>
                                </div>
                                <div>
                                  <h6 class="mb-2 fw-normal">Product in stock now: 54</h6>
                                  <h6 class="mb-2 fw-normal">Product in transit: 390</h6>
                                  <h6 class="mb-2 fw-normal">Last time restocked: 24th June, 2023</h6>
                                  <h6 class="mb-0 fw-normal">Total stock over lifetime: 2430</h6>
                                </div>
                              </div>
                              <!-- Shipping Tab -->
                              <div class="tab-pane fade" id="shipping" role="tabpanel">
                                <h6 class="mb-3 text-body">Shipping Type</h6>
                                <div>
                                  <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="shippingType" id="seller" />
                                    <label class="form-check-label" for="seller">
                                      <span class="mb-1 h6">Fulfilled by Seller</span><br />
                                      <small
                                        >You'll be responsible for product delivery.<br />
                                        Any damage or delay during shipping may cost you a Damage fee.</small
                                      >
                                    </label>
                                  </div>
                                  <div class="form-check mb-6">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="shippingType"
                                      id="companyName"
                                      checked />
                                    <label class="form-check-label" for="companyName">
                                      <span class="mb-1 h6"
                                        >Fulfilled by Company name &nbsp;<span
                                          class="badge rounded-2 badge-warning bg-label-warning fs-tiny py-1"
                                          >RECOMMENDED</span
                                        ></span
                                      ><br />
                                      <small
                                        >Your product, Our responsibility.<br />
                                        For a measly fee, we will handle the delivery process for you.</small
                                      >
                                    </label>
                                  </div>
                                  <p class="mb-0">
                                    See our <a href="javascript:void(0);">Delivery terms and conditions</a> for details
                                  </p>
                                </div>
                              </div>
                              <!-- Global Delivery Tab -->
                              <div class="tab-pane fade" id="global-delivery" role="tabpanel">
                                <h6 class="mb-3 text-body">Global Delivery</h6>
                                <!-- Worldwide delivery -->
                                <div class="form-check mb-4">
                                  <input class="form-check-input" type="radio" name="globalDel" id="worldwide" />
                                  <label class="form-check-label" for="worldwide">
                                    <span class="mb-1 h6">Worldwide delivery</span><br />
                                    <small
                                      >Only available with Shipping method:
                                      <a href="javascript:void(0);">Fulfilled by Company name</a></small
                                    >
                                  </label>
                                </div>
                                <!-- Global delivery -->
                                <div class="form-check mb-4">
                                  <input class="form-check-input" type="radio" name="globalDel" checked />
                                  <label class="form-check-label w-75 pe-12" for="country-selected">
                                    <span class="mb-2 h6">Selected Countries</span>
                                    <input
                                      type="text"
                                      class="form-control"
                                      placeholder="Type Country name"
                                      id="country-selected" />
                                  </label>
                                </div>
                                <!-- Local delivery -->
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="globalDel" id="local" />
                                  <label class="form-check-label" for="local">
                                    <span class="mb-1 h6">Local delivery</span><br />
                                    <small
                                      >Deliver to your country of residence :
                                      <a href="javascript:void(0);">Change profile address</a></small
                                    >
                                  </label>
                                </div>
                              </div>
                              <!-- Attributes Tab -->
                              <div class="tab-pane fade" id="attributes" role="tabpanel">
                                <h6 class="mb-2 text-body">Attributes</h6>
                                <div>
                                  <!-- Fragile Product -->
                                  <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="fragile" id="fragile" />
                                    <label class="form-check-label" for="fragile">
                                      <span class="fw-medium">Fragile Product</span>
                                    </label>
                                  </div>
                                  <!-- Biodegradable -->
                                  <div class="form-check mb-4">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      value="biodegradable"
                                      id="biodegradable" />
                                    <label class="form-check-label" for="biodegradable">
                                      <span class="fw-medium">Biodegradable</span>
                                    </label>
                                  </div>
                                  <!-- Frozen Product -->
                                  <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="frozen" checked />
                                    <label class="form-check-label w-75 pe-12" for="frozen">
                                      <span class="mb-1 h6">Frozen Product</span>
                                      <input
                                        type="number"
                                        class="form-control"
                                        placeholder="Max. allowed Temperature"
                                        id="frozen" />
                                    </label>
                                  </div>
                                  <!-- Exp Date -->
                                  <div class="form-check mb-6">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      value="expDate"
                                      id="expDate"
                                      checked />
                                    <label class="form-check-label w-75 pe-12" for="date-input">
                                      <span class="mb-1 h6">Expiry Date of Product</span>
                                      <input type="date" class="product-date form-control" id="date-input" />
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <!-- /Attributes Tab -->
                              <!-- Advanced Tab -->
                              <div class="tab-pane fade" id="advanced" role="tabpanel">
                                <h6 class="mb-3 text-body">Advanced</h6>
                                <div class="row">
                                  <!-- Product Id Type -->
                                  <div class="col">
                                    <label class="form-label" for="product-id">
                                      <span class="mb-1 h6">Product ID Type</span>
                                    </label>
                                    <select id="product-id" class="select2 form-select" data-placeholder="ISBN">
                                      <option value="">ISBN</option>
                                      <option value="ISBN">ISBN</option>
                                      <option value="UPC">UPC</option>
                                      <option value="EAN">EAN</option>
                                      <option value="JAN">JAN</option>
                                    </select>
                                  </div>
                                  <!-- Product Id -->
                                  <div class="col">
                                    <label class="form-label" for="product-id-1">
                                      <span class="mb-1 h6">Product ID</span>
                                    </label>
                                    <input
                                      type="number"
                                      id="product-id-1"
                                      class="form-control"
                                      placeholder="ISBN Number" />
                                  </div>
                                </div>
                              </div>
                              <!-- /Advanced Tab -->
                            </div>
                          </div>
                          <!-- /Options-->
                        </div>
                      </div>
                    </div>
                    <!-- /Inventory -->
                  </div>
                  <!-- /Second column -->

                  <!-- Second column -->
                  <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-title mb-0">Pricing</h5>
                      </div>
                      <div class="card-body">
                        <!-- Base Price -->
                        <div class="mb-6">
                          <label class="form-label" for="ecommerce-product-price">Base Price</label>
                          <input
                            type="number"
                            class="form-control"
                            id="ecommerce-product-price"
                            placeholder="Price"
                            name="productPrice"
                            aria-label="Product price" />
                        </div>
                        <!-- Discounted Price -->
                        <div class="mb-6">
                          <label class="form-label" for="ecommerce-product-discount-price">Discounted Price</label>
                          <input
                            type="number"
                            class="form-control"
                            id="ecommerce-product-discount-price"
                            placeholder="Discounted Price"
                            name="productDiscountedPrice"
                            aria-label="Product discounted price" />
                        </div>
                        <!-- Charge tax check box -->
                        <div class="form-check ms-2 mt-2 mb-4">
                          <input class="form-check-input" type="checkbox" value="" id="price-charge-tax" checked />
                          <label class="switch-label" for="price-charge-tax"> Charge tax on this product </label>
                        </div>
                        <!-- Instock switch -->
                        <div class="d-flex justify-content-between align-items-center border-top pt-2">
                          <span class="mb-0">In stock</span>
                          <div class="w-25 d-flex justify-content-end">
                            <div class="form-check form-switch me-n3">
                              <input type="checkbox" class="form-check-input" checked />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Pricing Card -->
                    <!-- Organize Card -->
                    <div class="card mb-6">
                      <div class="card-header">
                        <h5 class="card-title mb-0">Organize</h5>
                      </div>
                      <div class="card-body">
                        <!-- Vendor -->
                        <div class="mb-6 col ecommerce-select2-dropdown">
                          <label class="form-label mb-1" for="vendor"> Vendor </label>
                          <select id="vendor" class="select2 form-select" data-placeholder="Select Vendor">
                            <option value="">Select Vendor</option>
                            <option value="men-clothing">Men's Clothing</option>
                            <option value="women-clothing">Women's-clothing</option>
                            <option value="kid-clothing">Kid's-clothing</option>
                          </select>
                        </div>
                        <!-- Category -->
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="mb-6 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="category-org">
                              <span>Category</span>
                            </label>
                            <select id="category-org" class="select2 form-select" data-placeholder="Select Category">
                              <option value="">Select Category</option>
                              <option value="Household">Household</option>
                              <option value="Management">Management</option>
                              <option value="Electronics">Electronics</option>
                              <option value="Office">Office</option>
                              <option value="Automotive">Automotive</option>
                            </select>
                          </div>
                          <a href="javascript:void(0);" class="fw-medium btn btn-icon btn-label-primary ms-4"
                            ><i class="icon-base ti tabler-plus icon-md"></i
                          ></a>
                        </div>
                        <!-- Collection -->
                        <div class="mb-6 col ecommerce-select2-dropdown">
                          <label class="form-label mb-1" for="collection">Collection </label>
                          <select id="collection" class="select2 form-select" data-placeholder="Collection">
                            <option value="">Collection</option>
                            <option value="men-clothing">Men's Clothing</option>
                            <option value="women-clothing">Women's-clothing</option>
                            <option value="kid-clothing">Kid's-clothing</option>
                          </select>
                        </div>
                        <!-- Status -->
                        <div class="mb-6 col ecommerce-select2-dropdown">
                          <label class="form-label mb-1" for="status-org">Status </label>
                          <select id="status-org" class="select2 form-select" data-placeholder="Published">
                            <option value="">Published</option>
                            <option value="Published">Published</option>
                            <option value="Scheduled">Scheduled</option>
                            <option value="Inactive">Inactive</option>
                          </select>
                        </div>
                        <!-- Tags -->
                        <div>
                          <label for="ecommerce-product-tags" class="form-label mb-1">Tags</label>
                          <input
                            id="ecommerce-product-tags"
                            class="form-control"
                            name="ecommerce-product-tags"
                            value="Normal,Standard,Premium"
                            aria-label="Product Tags" />
                        </div>
                      </div>
                    </div>
                    <!-- /Organize Card -->
                  </div>
                  <!-- /Second column -->
                </div>
              </div>
            </div>