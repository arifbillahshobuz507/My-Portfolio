@extends('backend.layout.app')
@section('title')
    Services
@endsection
@section('content')
    <div class="container-fluid e-category">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-no-border text-end">
                        <div class="card-header-right-icon"><a class="btn btn-primary f-w-500" href="#!" data-bs-toggle="modal" data-bs-target="#dashboard8"><i class="fa-solid fa-plus pe-2"></i>Add Category</a>
                            <div class="modal fade" id="dashboard8" tabindex="-1" aria-labelledby="dashboard8" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content category-popup">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modaldashboard">Add Categories</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-0 custom-input">
                                            <div class="text-start">
                                                <div class="p-20">
                                                    <form class="row g-3 needs-validation" novalidate="">
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="validationCategoryName">Category Name<span class="txt-danger">*</span></label>
                                                            <input class="form-control" id="validationCategoryName" type="text" placeholder="Enter your category name" required="">
                                                            <div class="invalid-feedback">
                                                                Please enter a category name.</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="validationSlug">Slug<span class="txt-danger">*</span></label>
                                                            <input class="form-control" id="validationSlug" type="text" placeholder="Enter slug" required="">
                                                            <div class="invalid-feedback">
                                                                Please enter a slug name.</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Parent Category<span class="txt-danger">*</span></label>
                                                            <select class="form-select" aria-label="Select parent category">
                                                                <option selected="">T-shirts</option>
                                                                <option value="1">Purse</option>
                                                                <option value="2">Cameras</option>
                                                                <option value="3">Shoes </option>
                                                                <option value="4">Handbags</option>
                                                                <option value="5">Sleepers</option>
                                                                <option value="6">Watches</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please choose a parent category.</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Category Type<span class="txt-danger">*</span></label>
                                                            <select class="form-select" aria-label="Select category type">
                                                                <option selected="">Electronic</option>
                                                                <option value="1">Accessories</option>
                                                                <option value="2">Footwear</option>
                                                                <option value="3">Clothing</option>
                                                                <option value="4">Furniture</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please choose a category type.</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Category Status<span class="txt-danger">*</span></label>
                                                            <select class="form-select" aria-label="Select category status">
                                                                <option selected="">Active</option>
                                                                <option value="1">Inactive</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please choose a category status.</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Category Description</label>
                                                            <div class="toolbar-box">
                                                                <div id="toolbar9" class="ql-toolbar ql-snow">
                                                                    <button class="ql-bold" type="button"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button>
                                                                    <button class="ql-italic" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button>
                                                                    <button class="ql-underline" type="button"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button>
                                                                    <button class="ql-strike" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5"></line> <path class="ql-fill" d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"></path> <path class="ql-fill" d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"></path> </svg></button>
                                                                    <button class="ql-list" value="ordered" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button>
                                                                    <button class="ql-list" value="bullet" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button>
                                                                    <button class="ql-indent" value="-1" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line> <polyline class="ql-stroke" points="5 7 5 11 3 9 5 7"></polyline> </svg></button>
                                                                    <button class="ql-indent" value="+1" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line> <polyline class="ql-fill ql-stroke" points="3 7 3 11 5 9 3 7"></polyline> </svg></button>
                                                                    <button class="ql-link" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button>
                                                                </div>
                                                                <div id="editor9" class="ql-container ql-snow"><div class="ql-editor ql-blank" contenteditable="true" data-placeholder="Enter your messages..."><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
                                                            </div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="main-divider">
                                                                <div class="divider-body">
                                                                    <h6>SEO Tags</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label" for="validationMetaTitle">Meta Title<span class="txt-danger">*</span></label>
                                                            <input class="form-control" id="validationMetaTitle" type="text" placeholder="Enter meta title" required="">
                                                            <div class="invalid-feedback">
                                                                Please enter a meta title.</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label" for="validationKeyword">Meta Keywords<span class="txt-danger">*</span><span class="c-o-light">&nbsp;(In comma separated)</span></label>
                                                            <input class="form-control" id="validationKeyword" type="text" placeholder="Enter meta keywords" required="">
                                                            <div class="invalid-feedback">
                                                                Please enter a meta keywords(In comma separated).</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Meta Description</label>
                                                            <div class="toolbar-box">
                                                                <div id="toolbar10" class="ql-toolbar ql-snow">
                                                                    <button class="ql-bold" type="button"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button>
                                                                    <button class="ql-italic" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button>
                                                                    <button class="ql-underline" type="button"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button>
                                                                    <button class="ql-strike" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5"></line> <path class="ql-fill" d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"></path> <path class="ql-fill" d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"></path> </svg></button>
                                                                    <button class="ql-list" value="ordered" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button>
                                                                    <button class="ql-list" value="bullet" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button>
                                                                    <button class="ql-indent" value="-1" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line> <polyline class="ql-stroke" points="5 7 5 11 3 9 5 7"></polyline> </svg></button>
                                                                    <button class="ql-indent" value="+1" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line> <polyline class="ql-fill ql-stroke" points="3 7 3 11 5 9 3 7"></polyline> </svg></button>
                                                                    <button class="ql-link" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button>
                                                                </div>
                                                                <div id="editor10" class="ql-container ql-snow"><div class="ql-editor ql-blank" contenteditable="true" data-placeholder="Enter your messages..."><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Please enter a meta description</div>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="col-md-12 d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit">Create +</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-product list-category">
                            <div class="recent-table table-responsive custom-scrollbar">
                                <div id="project-status_wrapper" class="dt-container dt-empty-footer"><div class="dt-layout-row"><div class="dt-layout-cell dt-start "><div class="dt-length"><select name="project-status_length" aria-controls="project-status" class="dt-input" id="dt-length-0"><option value="10">10</option><option value="14">14</option><option value="18">18</option><option value="22">22</option></select><label for="dt-length-0"> entries per page</label></div></div><div class="dt-layout-cell dt-end "><div class="dt-search"><label for="dt-search-0">Search:</label><input type="search" class="dt-input" id="dt-search-0" placeholder="" aria-controls="project-status"></div></div></div><div class="dt-layout-row dt-layout-table"><div class="dt-layout-cell "><table class="table dataTable" id="project-status" aria-describedby="project-status_info"><colgroup><col><col><col><col><col></colgroup>
                                                <thead>
                                                <tr role="row"><th data-dt-column="0" rowspan="1" colspan="1" class="dt-select dt-orderable-none" aria-label=""><span class="dt-column-title"></span><span class="dt-column-order"></span><input class="dt-select-checkbox" type="checkbox" aria-label="Select all rows"></th><th data-dt-column="1" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-asc" aria-sort="ascending" aria-label=" Category: Activate to invert sorting" tabindex="0"><span class="dt-column-title" role="button"> <span class="c-o-light f-w-600">Category</span></span><span class="dt-column-order"></span></th><th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label=" Description: Activate to sort" tabindex="0"><span class="dt-column-title" role="button"> <span class="c-o-light f-w-600">Description</span></span><span class="dt-column-order"></span></th><th data-dt-column="3" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label=" Category Type: Activate to sort" tabindex="0"><span class="dt-column-title" role="button"> <span class="c-o-light f-w-600">Category Type</span></span><span class="dt-column-order"></span></th><th data-dt-column="4" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label=" Action: Activate to sort" tabindex="0"><span class="dt-column-title" role="button"> <span class="c-o-light f-w-600">Action</span></span><span class="dt-column-order"></span></th></tr>
                                                </thead>
                                                <tbody><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="{{asset('backend/assets')}}/images/email-template/3.png" alt="chair"></div>

                                                            <p>Accent Chair</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">A luxurious touch is added with a comfy accent chair</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-warning">Furniture</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/dashboard-8/product-categories/phone.png" alt="phone"></div>
                                                            <p>Apple iphone 13 pro</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Highlights the powerful processor</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-success">Electric</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/dashboard-2/product/1.png" alt="chairs"></div>
                                                            <p>Arm chair</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Popular seating options for a variety of events are armchairs</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-warning">Furniture</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"><a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/dashboard-8/product-categories/dvd.png" alt="dvd"></div>
                                                            <p>DVD</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">High-quality DVD for a great viewing experience</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-success">Electronic</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/dashboard-8/shop-categories/mouse.png" alt="mouse"></div>
                                                            <p>Green wireless mouse</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Go cordless and eco-friendly with this sleek mouse</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-success">Electric</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/product/2.png" alt="t-shirt"></div>
                                                            <p>Half sleeves T-shirt</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Special Price get at flat ₹100</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-primary">Clothing</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/product/category/2.png" alt="hand bags"></div>
                                                            <p>Handbags</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Passed 30+ quality checks performed by experts for comfort &amp; design</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-secondary">Accessories</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/dashboard-8/product-categories/ipad.png" alt="slipper"></div>
                                                            <p>MacBook Air 13.3-inch</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Students, take your learning anywhere with the macBook air</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-primary">Electric</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/product/1.png" alt="t-shirt"></div>
                                                            <p>Polo T-shirt</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Special Price get at flat ₹229</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-primary">Clothing</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr><tr class="product-removes inbox-data">
                                                    <td class="dt-select"><input aria-label="Select row" class="dt-select-checkbox" type="checkbox"></td>
                                                    <td class="sorting_1">
                                                        <div class="product-names">
                                                            <div class="light-product-box"><img class="img-fluid" src="../assets/images/product/category/1.png" alt="shoes"></div>
                                                            <p>Shoes</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="f-light">Up to ₹300, on orders of ₹1750 and above T &amp; C</p>
                                                    </td>
                                                    <td> <span class="badge badge-light-primary">Footwear</span></td>
                                                    <td>
                                                        <div class="common-align gap-2 justify-content-start"> <a class="square-white" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#edit-content"></use>
                                                                </svg></a><a class="square-white trash-3" href="#!">
                                                                <svg>
                                                                    <use href="../assets/svg/icon-sprite.svg#trash1"></use>
                                                                </svg></a></div>
                                                    </td>
                                                </tr></tbody>
                                                <tfoot></tfoot></table></div></div><div class="dt-layout-row"><div class="dt-layout-cell dt-start "><div class="dt-info" aria-live="polite" id="project-status_info" role="status">Showing 1 to 10 of 20 entries</div></div><div class="dt-layout-cell dt-end "><div class="dt-paging paging_full_numbers"><button class="dt-paging-button disabled first" role="link" type="button" aria-controls="project-status" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1">«</button><button class="dt-paging-button disabled previous" role="link" type="button" aria-controls="project-status" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1">‹</button><button class="dt-paging-button current" role="link" type="button" aria-controls="project-status" aria-current="page" data-dt-idx="0" tabindex="0">1</button><button class="dt-paging-button" role="link" type="button" aria-controls="project-status" data-dt-idx="1" tabindex="0">2</button><button class="dt-paging-button next" role="link" type="button" aria-controls="project-status" aria-label="Next" data-dt-idx="next" tabindex="0">›</button><button class="dt-paging-button last" role="link" type="button" aria-controls="project-status" aria-label="Last" data-dt-idx="last" tabindex="0">»</button></div></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
