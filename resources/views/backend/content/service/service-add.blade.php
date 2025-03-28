@extends('backend.layout.app')
@section('title')
    Services Add
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card create-project-form custom-input">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row g-3 needs-validation">
                                    <div class="col-md-12">
                                        <label class="form-label" for="title">Title</label>
                                        <input class="form-control" id="title" type="text" placeholder="Enter Your Title">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="description">Details</label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Enter Your details" rows="4"></textarea>
                                        <div class="invalid-feedback">Please enter your service details.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="image">Upload Image</label>
                                        <input class="form-control" name="image" id="image" type="file" multiple="">
                                        <div class="invalid-feedback">Please select your files.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="icon">Upload Icon</label>
                                        <input class="form-control" name="icon" id="icon" type="file">
                                        <div class="invalid-feedback">Please select your files.</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="common-flex justify-content-end">
                                            <button class="btn btn-primary" onclick="submitService()" type="submit">Add </button>
                                            <button class="btn btn-secondary" href="#">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        async function submitService(){
            console.log("hello world");
            let title = document.getElementById('title').value;
            let description = document.getElementById('description').value;
            let image = document.getElementById('image').files[0];
            let icon = document.getElementById('icon').files[0];
            if(title.length===0){
                errorToast("Title is Required")
            } else {
                showLoader();
                let formData = new FormData();
                formData.append("title", title);
                formData.append("description", description);
                formData.append("image", image); // Make sure `image` is a File object
                formData.append("icon", icon);

                let result = await axios.post("/services/store", formData, {
                    headers: { "Content-Type": "multipart/form-data" }
                });
                hideLoader();
                if(result.data['status']==='success'){
                    successToast(result.data['message']);
                    setTimeout(function() {
                        window.location.href = "/services"
                    })
                } else {
                    errorToast(result.data['message']);
                }
            }
        }
    </script>
@endsection


