@extends('admin.layouts.default')
@section('title', 'Add Product')
@section('content')

<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" />
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<style>
    html * {
        box-sizing: border-box;
    }

    p {
        margin: 0;
    }

    .upload__box {
        padding: 50px 0;
        min-height: 342px;
        border: 1px dotted;
        position: relative;
        background: white;
    }

    .upload__inputfile {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        color: #fff;
        text-align: center;
        min-width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 56px;
        line-height: 26px;
        font-size: 35px;
        position: absolute;
        top: 37%;
        font-weight: 900;
        left: 43%;
    }

    .uploaded__btn {
        color: #fff;
        text-align: center;
        min-width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 56px;
        line-height: 26px;
        font-size: 35px;
        position: absolute;
        font-weight: 900;
        bottom: 5%;
        right: 6%;
        bottom: 9%;
    }

    .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all .3s ease;
    }

    .upload__btn-box {
        margin-bottom: 10px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }
</style>

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

    <section class="product-sec">
        <form class=" g-3 mt-3 needs-validation" id="product_detail_from" method="post" action="{{ route('admin.storeProduct') }}" novalidate enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{  $product['id'] ?? '' }}">
            <div class="row gy-4">
                <div class=" col-md-6 extra-images">
                    <label class="form-label">Extra Images</label>
                    <div class="upload__box">
                        <div class="upload__btn-box">
                            <div class="upload__img-wrap">
                                <label class="upload__btn" id="uploadbtn" for="product_images">
                                    <p>+</p>
                                    <input type="file" multiple data-max_length="5" id="product_images" name="images" class="upload__inputfile">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="invalid-feedback">Please select product image!</div>
                    @error('images')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 text-and-gallery-images">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Product Title</label>
                            <input class="form-control me-2" type="text" name="title" id="pro_id" value="{{  $product['title'] ?? old('title') }}" placeholder="Product Title" aria-label="Search" required>
                            <div class="invalid-feedback">Please write product title!</div>
                            @error('title')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        @php
                        $path = url('assets/admin/img/upload_btn.png');
                        if($product['main_image'] ?? NULL){
                        $path = asset('storage/'.$product['main_image']);
                        }
                        @endphp
                        <div class="col-12 mt-2 produt-main-image">
                            <label for="product_main_image" class="form-label">Upload Main Image</label>
                            <div class="d-flex align-items-center" style="gap: 20px; justify-content: space-between;">
                                <input type="file" class="form-control w-100" id="product_main_image" name="main_image" value="{{ ($product['main_image'] ?? NULL) ? 'required' : '' }}" onchange="previewMainImage(this)">
                                <label for="product_main_image" class=" d-block ">
                                    <img id="mainImage_preview" src="{{  $path ?? '' }}" class="rounded-circle" alt="no image" style="width: 45px; height: 45px;  cursor:pointer;   object-fit: cover;">
                                </label>
                            </div>
                            <div class="invalid-feedback">* Upload product main Image!</div>
                        </div>
                        <div class="col-12 select-product-category">
                            <label for="category_id" class="form-label">Select Product Category</label>
                            <select id="category_id" name="category_id" class="form-select" required>
                                <option value="" selected>Choose...</option>
                                @foreach ($categories as $key => $value)
                                <option value="{{ $value['id'] ?? '' }}" {{ (isset($product['category_id']) && $product['category_id'] == $value['id']) ? 'selected' : '' }}>{{ $value['name'] ?? '' }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">* Please select product category</div>
                        </div>
                        <div class="col-12 select-sub_category">
                            <label for="sub_category" class="form-label">Select Sub Category</label>
                            <select id="sub_category" name="sub_category" class="form-select">
                            </select>
                            <div class="invalid-feedback">* Please select sub category</div>
                        </div>
                        <div class="col-12 select-child_category">
                            <label for="child_category" class="form-label">Select Child Category</label>
                            <select id="child_category" name="child_category" class="form-select">
                            </select>
                            <div class="invalid-feedback">* Please select child category</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="ext_tax" class="col-form-label"> Extra Tax <span class="extra-text"></span></label>
                    <input type="number" name="ext_tax" id="ext_tax" value="{{  $product['ext_tax'] ?? old('ext_tax') }}" class="form-control" required>
                    <div class="invalid-feedback">Enter extra tax!</div>
                    @error('ext_tax')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="price" class="col-form-label"> Price <span class="extra-text">(Price in UK Pound)</span></label>
                    <input type="number" name="price" id="price" value="{{  $product['price'] ?? old('price') }}" class="form-control" required>
                    <div class="invalid-feedback">Enter product price!</div>
                    @error('price')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="stock" class="col-form-label">Inventory <span class="extra-text">(Available Stock)</span></label>
                    <input type="number" id="stock" name="stock" value="{{  $product['stock'] ?? old('stock') }}" class="form-control" required>
                    <div class="invalid-feedback">Enter product stock!</div>
                    @error('stock')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="stock" class="col-form-label">SKU </label>
                    <input type="number" name="SKU" id="SKU" value="{{  $product['SKU'] ?? old('SKU') }}" class="form-control" >
                    <div class="invalid-feedback">Enter avialable stock!</div>
                    @error('SKU')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="barcode" class="form-label">Barcode (ISBN, UPC, GTIN, etc.)</label>
                    <input type="number" name="barcode" id="barcode" value="{{  $product['barcode'] ?? old('barcode') }}" class="form-control" >
                    <div class="invalid-feedback">Enter GTIN number!</div>
                    @error('barcode')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            </div>
            <div class="row mb-5">
                <div class="form-floating col-12  mt-3">
                    <textarea class="form-control tinymce-editor" name="short_desc" id="short_desc" placeholder="Product short Description" required=''>{{$product['short_desc'] ?? ''}}</textarea>
                    <div class="invalid-feedback">Please write product short desc!</div>
                    @error('short_desc')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-5">
                <div class="form-floating col-12  mt-3">
                    <textarea class="form-control tinymce-editor" name="desc" id="pro_desc" placeholder="Product main Description" required=''>{{$product['desc'] ?? ''}}</textarea>
                    <div class="invalid-feedback">Please write product Main desc!</div>
                    @error('desc')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="container-fluid m-0 ">
                <div class="d-flex justify-content-between col-md-12 align-items-center">
                    <div class="variants-div">
                        <h4 class="fw-bold">Product Variants</h4>
                    </div>
                    <div class=" float-end">
                        <div class="p-2">
                            <lable id="add_new_row" class="btn btn-success mb-2"><i class="fa fa-plus"></i> Add Variants</lable>
                        </div>
                    </div>
                </div>
                {{-- existing variants --}}
                <div id="variant_row_existing">
                    @if(isset($product['variants']))
                        @foreach ($product['variants'] as $variant)  
                            <div class="row bg-white rounded-3  mb-4 py-2">
                                <input type="hidden" value="{{$variant['id']}}" name="exist_vari_id[]">
                                <div class="col-12">
                                    <hr class="">
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="p-2">
                                        <label for="" class="form-label">Variant Price <span class="extra-text">(Price in UK Pound)</span></label>
                                        <input type="number" class="form-control" name="exist_vari_price[]" id="" value="{{ $variant['price']}}" required>
                                        <div class="invalid-feedback">Enter variant price!</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="p-2">
                                        <label for="" class="form-label">Variant Name <span class="extra-text"></span></label>
                                        <input type="text" class="form-control" name="exist_vari_name[]" id="" value = "{{ $variant['title']}}" required>
                                        <div class="invalid-feedback">Enter variant title!</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 product-md">
                                    <div class="p-2">
                                        <label for="" class="form-label">Variant Value <span class="extra-text"></span></label>
                                        <input type="text" class="form-control" name="exist_vari_value[]" id="" value = "{{ $variant['value']}}" required>
                                        <div class="invalid-feedback">Enter variant value!</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 ">
                                    <div class="p-2">
                                        <label for="" class="form-label">Inventory <span class="extra-text">(Available Stock)</span></label>
                                        <input type="number" class="form-control" name="exist_vari_inventory[]" id="" value = "{{ $variant['inventory']}}" required>
                                        <div class="invalid-feedback">Enter variant stock!</div>
                                    </div>
                                </div>
            
                                <div class="col-md-3 col-sm-12">
                                    <div class="p-2">
                                        <label for="" class="form-label">Barcode <span class="extra-text">(ISBN, UPC, GTIN, etc.)</span></label>
                                        <input type="number" class="form-control" name="exist_vari_barcode[]" id="" value = "{{ $variant['barcode']}}">
                                        <div class="invalid-feedback">Enter variant barcode!</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="p-2">
                                        <label for="" class="form-label">SKU <span class="extra-text">(Stock Keeping Unit)</span></label>
                                        <input type="number" class="form-control" name="exist_vari_sku[]" id="" value = "{{ $variant['sku']}}">
                                        <div class="invalid-feedback">Enter variant stock!</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 ">
                                    <div class="p-2">
                                        <label  class="form-label">Select Image</label>
                                        <input class="form-control variant-image-exist" name="exist_vari_attr_image[]" type="file" id="">
                                        <div class="invalid-feedback">Enter variant image!</div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3 col-sm-12 mt-4 ">
                                    <div class="p-2 ">
                                        <button type="button" class="btn remove_row btn-danger"><i class="fa fa-minus"></i> Remove</button>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <hr class="">
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div id="variant_row">

                </div>
            </div>
            <div class="product-btns mt-4 text-end px-4 d-flex d-md-block">
                <input type="reset" class=" btn btn-secondary rounded-2  px-5 mx-1 fw-bold" value="Cancel">
                <button class="rounded-2 py-2 px-5 fw-bold mt-0">Submit</button>
            </div>

            </div>
        </form>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>
    jQuery(document).ready(function() {
        ImgUpload();

        $('#category_id').change(function() {
            var category_id = $(this).val();
            $.ajax({
                    url: '{{ route("admin.getSubCategory") }}',
                    type: 'GET',
                    data: {
                        category_id: category_id
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#sub_category').empty();
                            $.each(response.sub_category, function(key, value) {
                                $('#sub_category').append($('<option>', {
                                    value: key,
                                    text: value
                                }));
                            });
                            $('#sub_category').prepend($('<option>', {
                                value: '',
                                text: 'Select Sub Category',
                                selected: true, 
                                disabled: true
                            }));
                        }
                        else{
                            console.error('Error:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
        });

        $('#sub_category').change(function() {
            var category_id = $(this).val();
            $.ajax({
                    url: '{{ route("admin.getChildCategory") }}',
                    type: 'GET',
                    data: {
                        category_id: category_id
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#child_category').empty();
                            $.each(response.child_category, function(key, value) {
                                $('#child_category').append($('<option>', {
                                    value: key,
                                    text: value
                                }));
                            });
                            $('#child_category').prepend($('<option>', {
                                value: '',
                                text: 'Select Child Category',
                                selected: true, 
                                disabled: true
                            }));
                        }
                        else{
                            console.error('Error:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
        });
    });

    var imgArray = [];

    function ImgUpload() {
        var imgWrap = $('.upload__img-wrap');
        var maxLength = $('.upload__inputfile').attr('data-max_length');

        $('.upload__inputfile').on('change', function(e) {
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);

            for (var i = 0; i < filesArr.length; i++) {
                if (!filesArr[i].type.match('image.*')) {
                    continue;
                }

                imgArray.push(filesArr[i]);

                var reader = new FileReader();
                reader.onload = function(e) {
                    var html =
                        "<div class='upload__img-box'><div style='background-image: url(" +
                        e.target.result + ")' data-number='" + imgArray.length +
                        "' data-file='" + imgArray[imgArray.length - 1].name +
                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                    $('#uploadbtn').removeClass('upload__btn').addClass('uploaded__btn');
                    imgWrap.prepend(html);
                };

                reader.readAsDataURL(filesArr[i]);
            }
        });

        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            imgArray = imgArray.filter(function(img) {
                return img.name !== file;
            });
            $(this).parent().parent().remove();
        });

        $('body').on('submit', '#product_detail_from', function(e) {
            e.preventDefault();

            // Create FormData object
            var formData = new FormData();
            // Append main image
            formData.append('main_image', $('#product_main_image')[0].files[0]);
            // Append variant images
            $('.variant-image').each(function(index, element) {
                formData.append('vari_attr_images[]', element.files[0]);
            });
            // Append variant images Existing
            $('.variant-image-exist').each(function(index, element) {
                var variantId = $(element).closest('.row').find('input[name="exist_vari_id[]"]').val();
                formData.append('exist_vari_attr_images[' + variantId + ']', element.files[0]);
            });
            // Append images to the FormData object
            for (var i = 0; i < imgArray.length; i++) {
                formData.append('images[]', imgArray[i]);
            }

            // Append other form data
            $(this).serializeArray().forEach(function(field) {
                formData.append(field.name, field.value);
            });

            // Submit the form with AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        window.location.href = "{{ route('admin.prodcuts') }}";
                    } else if (response.status === 'error') {

                        console.log(response.message);
                        $('.error-label').remove();

                        $.each(response.message, function(field, errorMessages) {
                            var inputField = $('input[name="' + field + '"]');

                            $.each(errorMessages, function(index, errorMessage) {
                                var errorLabel = $('<label class="error-label text-danger">* ' + errorMessage + '</label>');
                                inputField.addClass('error');
                                inputField.after(errorLabel);
                            });
                        });
                    }

                },
                error: function(error) {
                    alert('technical error occur')
                }
            });
        });

        $('input').on('input', function() {
            $(this).removeClass('error');
            $(this).next('.error-label').remove();
        });

        $('select').on('change', function() {
            $(this).removeClass('error');
            $(this).next('.error-label').remove();
        });

    }

    function previewMainImage(input) {
        var preview = $('#mainImage_preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.attr('src', e.target.result);
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // new row add 
    var new_row = `<div class="row bg-white rounded-3  mb-4 py-2">
                        <div class="col-12">
                            <hr class="">
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="p-2">
                                <label for="" class="form-label">Variant Price <span class="extra-text">(Price in UK Pound)</span></label>
                                <input type="number" class="form-control" name="vari_price[]" id="" required>
                                <div class="invalid-feedback">Enter variant price!</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="p-2">
                                <label for="" class="form-label">Variant Name <span class="extra-text"></span></label>
                                <input type="text" class="form-control" name="vari_name[]" id="" required>
                                <div class="invalid-feedback">Enter variant title!</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 product-md">
                            <div class="p-2">
                                <label for="" class="form-label">Variant Value <span class="extra-text"></span></label>
                                <input type="text" class="form-control" name="vari_value[]" id="" required>
                                <div class="invalid-feedback">Enter variant value!</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 ">
                            <div class="p-2">
                                <label for="" class="form-label">Inventory <span class="extra-text">(Available Stock)</span></label>
                                <input type="number" class="form-control" name="vari_inventory[]" id="" required>
                                <div class="invalid-feedback">Enter variant stock!</div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="p-2">
                                <label for="" class="form-label">Barcode <span class="extra-text">(ISBN, UPC, GTIN, etc.)</span></label>
                                <input type="number" class="form-control" name="vari_barcode[]" id="" >
                                <div class="invalid-feedback">Enter variant barcode!</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="p-2">
                                <label for="" class="form-label">SKU <span class="extra-text">(Stock Keeping Unit)</span></label>
                                <input type="number" class="form-control" name="vari_sku[]" id="" >
                                <div class="invalid-feedback">Enter variant stock!</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 ">
                            <div class="p-2">
                                <label  class="form-label">Select Image</label>
                                <input class="form-control variant-image" name="vari_attr_image[]" type="file" id="" required>
                                <div class="invalid-feedback">Enter variant image!</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 mt-4 ">
                            <div class="p-2 ">
                                <button type="button" class="btn remove_row btn-danger"><i class="fa fa-minus"></i> Remove</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="">
                        </div>
                    </div>`;

    $('#add_new_row').on('click', function() {
        $('#variant_row').append(new_row);
    });

    $(document).on('click', '.remove_row', function() {
        $(this).closest('.row').fadeOut('slow', function() {
            $(this).remove();
        });
    });
</script>
@endPushOnce