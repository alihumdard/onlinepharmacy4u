@extends('admin.layouts.default')
@section('title', 'Add Product')
@section('content')
    <!-- main stated -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="product-sec" style="position: relative;">
            <div class="row">
                <div class=" col-md-6">
                    <div class="row gy-3">
                        <div class="col-sm-4  col-md-12">
                            <img class="img-fluid product-image" src="{{ asset('assets/admin/img/productsssss.jpg') }}"
                                alt="" style="width: 100%; height: 330px">
                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="" >

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="http://127.0.0.1:8000/assets/admin/img/profile-img.jpg" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/download.JPG') }}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="">

                        </div>
                    </div>
                    <div class="col-lg-12">
                    </div>
                </div>
                <div class="col-md-6">

                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <div class="form-floating mt-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>

                    <hr>
                    <!--colors-section start-->
                    {{-- <div class="colors-sec">
                        <h5>Available Colors</h5>
                        <div class="row gy-2 ps-3">
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Green
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-1">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Blue
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-2">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Purple
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-3">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Red
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-4">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Orange
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-5">

                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>

                    </div> --}}


                    {{-- <div class="colors-sec mt-3">
                        <h5>Size please select</h5>
                        <div class="color-box-main d-flex">
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text">
                                        <h4 class="fw-bold">S</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>small</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text">
                                        <h3 class="fw-bold">M</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>Medium</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text ">
                                        <h4 class="fw-bold">L</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>Large</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text">
                                        <h4 class="fw-bold">XL</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>Xtra-Large</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                    <div class="pricing mt-3">
                        <form>
                            <div class="row gy-2">
                                <div class="col-md-2">
                                    <label for="inputPassword6" class="col-form-label">Price</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="inputPassword6" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputPassword6" class="col-form-label">Price</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="inputPassword6" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <label for="inputPassword6" class="col-form-label">Price</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="inputPassword6" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputPassword6" class="col-form-label">Price</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="inputPassword6" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">

                                <div class="col-md-2">
                                    <label for="inputPassword6" class="col-form-label">Ex Tax:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="inputPassword6" class="form-control">
                                </div>
                            </div>
                    </div>

                    <div class="product-btns mt-4">
                        <button>Cancel</button> &nbsp;
                        <button>Submit</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="file-input-container">
                <input class="file-input" type="file" name="user_pic" id="fileInput1">
                <div class="upload-icon" onclick="document.getElementById('fileInput1').click()">
                  <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="18" r="18" fill="#233A85"></circle>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1634 23.6195L22.3139 15.6658C22.6482 15.2368 22.767 14.741 22.6556 14.236C22.559 13.777 22.2768 13.3406 21.8534 13.0095L20.8208 12.1893C19.922 11.4744 18.8078 11.5497 18.169 12.3699L17.4782 13.2661C17.3891 13.3782 17.4114 13.5438 17.5228 13.6341C17.5228 13.6341 19.2684 15.0337 19.3055 15.0638C19.4244 15.1766 19.5135 15.3271 19.5358 15.5077C19.5729 15.8614 19.3278 16.1925 18.9638 16.2376C18.793 16.2602 18.6296 16.2075 18.5107 16.1097L16.676 14.6499C16.5868 14.5829 16.4531 14.5972 16.3788 14.6875L12.0185 20.3311C11.7363 20.6848 11.6397 21.1438 11.7363 21.5878L12.2934 24.0032C12.3231 24.1312 12.4345 24.2215 12.5682 24.2215L15.0195 24.1914C15.4652 24.1838 15.8812 23.9807 16.1634 23.6195ZM19.5955 22.8673H23.5925C23.9825 22.8673 24.2997 23.1886 24.2997 23.5837C24.2997 23.9795 23.9825 24.3 23.5925 24.3H19.5955C19.2055 24.3 18.8883 23.9795 18.8883 23.5837C18.8883 23.1886 19.2055 22.8673 19.5955 22.8673Z" fill="white"></path>
                  </svg>
                </div>
              </div>
        </section>

    </main>
    <!-- End #main -->

@stop

@pushOnce('scripts')
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var image_element = $(this).attr('src')

                $('.product-image').prop('src', image_element)
                //   $('.product-image-thumb.active').removeClass('active')
                //   $(this).addClass('active')
            })
        })
    </script>
@endPushOnce
