@extends('web.layouts.default', ['menu_categories' => $menu_categories])
@section('title', 'Home')
@section('content')
<style>
    .contact-form-box {
        padding: 40px 50px 40px 40px !important;
    }
</style>
<div class="ltn__contact-message-area mb-120 mt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__form-box contact-form-box box-shadow white-bg" style="padding: 40px 50px 40px 40px !important;">
                    <h4 class="title-2">Order Enquiry</h4>
                    <form id="contact-form" action="mail.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item input-item-nam">
                                    <input type="text" name="name" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-item-email">
                                    <input type="email" name="email" placeholder="Enter subject">
                                </div>
                            </div>
                            <div class="input-item mb-25">
                        <textarea id="summernote" name="content"></textarea>
</div>
<div class="input-item">
                            <label>Enquiry Type</label>
                            <select class="nice-select">
                                <option disabled selected>Select</option>
                                <option>Human Vet order</option>
                                <option>App Query</option>
                                <option>App Account Delete request</option>
                                <option>Other</option>
                            </select>
                        </div>
                            <div class="col-md-6">
                                <div class="input-item input-item-subject">
                                    <input type="text" name="subject" placeholder="Name of Animal - For Vet Orders only">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-item-phone">
                                    <input type="text" name="phone" placeholder="Enter phone number">
                                </div>
                            </div>
                        </div>
                        <div class="input-item input-item-textarea">
                            <textarea name="message" placeholder="Human Prescription Item(s) required and quantity - For Vet Orders only"></textarea>
                        </div>
           
                        <div class="input-item">
                            <label>Device Type - App queries only</label>
                            <select class="nice-select">
                                <option disabled selected>Select</option>
                                <option>Apple</option>
                                <option>Android</option>
                            </select>
                        </div>
                        <div class="input-item">
                            <label>NHS login used - App Queries only</label>
                            <select class="nice-select">
                                <option disabled selected>Select</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
    
                        <div class="btn-wrapper mt-0">
                            <button class="btn theme-btn-1 btn-effect-1" type="submit">Submit</button>
                        </div>
                        <p class="form-messege mb-0 mt-20"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@pushOnce('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('summernote');
</script>
@endPushOnce
