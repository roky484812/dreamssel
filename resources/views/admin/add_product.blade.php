@extends('layouts.admin', ['title'=> 'Add Product', 'active'=> 'product'])
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Add Items</h4>
                </div>
                <div class="page-rightheader ms-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg class="side-menu__icon" width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M26.6667 21.8833H13.3334"></path>
                                    <path d="M20 28.5499V15.2166"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.7666 3.33325H9.99996C9.1159 3.33325 8.26806 3.68444 7.64294 4.30956C7.01782 4.93468 6.66663 5.78253 6.66663 6.66659V33.3333C6.66663 34.2173 7.01782 35.0652 7.64294 35.6903C8.26806 36.3154 9.1159 36.6666 9.99996 36.6666H30C30.884 36.6666 31.7319 36.3154 32.357 35.6903C32.9821 35.0652 33.3333 34.2173 33.3333 33.3333V14.8666C33.3393 14.5257 33.234 14.1922 33.0333 13.9166L26.1166 4.04992C25.9651 3.83144 25.7635 3.65238 25.5286 3.52771C25.2938 3.40304 25.0325 3.33636 24.7666 3.33325V3.33325Z"></path>
                                </svg><span class="breadcrumb-icon"> Add Item</span></a></li>

                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form method="post" class="card">
                        <div class="card-header">
                            <h3 class="card-title">File Upload</h3>
                        </div>
                        <div class=" card-body">
                            <div class="row">

                                <div class="col-lg-6 col-sm-12">
                                    <label class="form-label text-dark" for="">Thumbnail</label>
                                    <div class="dropify-wrapper" style="height: 192px;"><div class="dropify-message"><span class="file-icon"> <p>Drag and drop a file here or click</p></span><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input type="file" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="180"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <label class="form-label text-dark" for="">Multiple Image</label>
                                    <input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple="" class="ff_fileupload_hidden"><div class="ff_fileupload_wrap"><div class="ff_fileupload_dropzone_wrap"><button class="ff_fileupload_dropzone" type="button" aria-label="Browse, drag-and-drop, or paste files to upload"></button></div><table class="ff_fileupload_uploads"></table></div>
                                </div>

                            </div>


                        </div>
                    </form>

                    <form method="post" class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Details</h3>
                        </div>
                        <div class="card-body ">

                            <div class="form-group">
                                <label class="form-label text-dark">Product Title</label>
                                <input type="text" class="form-control" placeholder="I tell a teil of a tail">
                            </div>

                            <!-- TODO:Here i need to implement the description form -->

                            <div class="row ">
                                <div class="col-md-12">

                                    <label class="form-label text-dark">Product Description</label>

                                    <div class="card-body">
                                        <div class="ql-wrapper ql-wrapper-demo bg-light">
                                            <div class="ql-toolbar ql-snow"><span class="ql-formats"><span class="ql-header ql-picker"><span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-0"><svg viewBox="0 0 18 18"> <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon> <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon> </svg></span><span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-0"><span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="3"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="4"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="5"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="6"></span><span tabindex="0" role="button" class="ql-picker-item ql-selected"></span></span></span><select class="ql-header" style="display: none;"><option value="1"></option><option value="2"></option><option value="3"></option><option value="4"></option><option value="5"></option><option value="6"></option><option selected="selected"></option></select></span><span class="ql-formats"><button type="button" class="ql-bold"><i class="fa fa-bold" aria-hidden="true"></i></button><button type="button" class="ql-italic"><i class="fa fa-italic" aria-hidden="true"></i></button><button type="button" class="ql-underline"><i class="fa fa-underline" aria-hidden="true"></i></button><button type="button" class="ql-strike"><i class="fa fa-strikethrough" aria-hidden="true"></i></button></span><span class="ql-formats"><button type="button" class="ql-list" value="ordered"><i class="fa fa-list-ol" aria-hidden="true"></i></button><button type="button" class="ql-list" value="bullet"><i class="fa fa-list-ul" aria-hidden="true"></i></button></span><span class="ql-formats"><button type="button" class="ql-link"><i class="fa fa-link" aria-hidden="true"></i></button><button type="button" class="ql-image"><i class="fa fa-image" aria-hidden="true"></i></button><button type="button" class="ql-video"><i class="fa fa-film" aria-hidden="true"></i></button></span></div><div id="quillEditor" class="ql-container ql-snow"><div class="ql-editor ql-blank" data-gramm="false" contenteditable="true"><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-3 row">




                                <div class="add-category">
                                    <label class="form-label">Select Category</label>

                                    <!-- category adding popup -->
                                    <div class="form-group add-close-label" id="add-category-input-1" style="display: none;">
                                        <input type="text" class="form-control add-select-category" placeholder="Add your Category">
                                        <button class=" add-button btn-add-1">Add</button>
                                        <button class="cancel-button btn-cancel-1">Cancel</button>
                                    </div>
                                    <!-- category adding popup end -->
                                    <svg onclick="openPopup1()" class="add-category-icon" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512" fill="#6A983C"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path>
                                    </svg>
                                </div>
                                <div class="col-md-12">
                                    <div class="SumoSelect" tabindex="0" role="button" aria-expanded="false"><select class="search_test SumoUnder" tabindex="-1">
                                        <option class="hemant" selected="" value="saab">Saab</option>
                                        <option class="hemant" value="opel">Opel</option>
                                        <option value="chrysler">Chrysler</option>
                                        <option value="gm">General Motors</option>
                                        <option value="ford">Ford</option>
                                        <option value="citroen">Citroën</option>
                                        <option value="peugeot">Peugeot</option>
                                        <option value="renault">Renault</option>
                                        <option value="nissan">Nissan</option>

                                        <optgroup label="US Brands">

                                            <option disabled="disabled" value="plymouth">Plymouth
                                            </option>
                                        </optgroup>
                                        <optgroup label="French Brands">

                                        </optgroup>
                                        <optgroup label="Italian brands">
                                            <option value="fiat">Fiat</option>
                                            <option value="alpha-Romeo">Alpha Romeo</option>
                                            <option value="lamborghini">Lamborghini</option>
                                        </optgroup>
                                        <optgroup disabled="disabled" label="German brands">
                                            <option value="audi">Audi</option>
                                            <option value="bMW">BMW</option>
                                            <option value="volkswagen">Volkswagen</option>
                                        </optgroup>
                                        <option value="aston-martin">Aston Martin</option>
                                        <option value="hyundai">Hyundai</option>
                                        <option value="mitsubishi">Mitsubishi</option>
                                    </select><p class="CaptionCont SelectBox search" title=" Saab"><span> Saab</span><label><i></i></label><input type="text" class="search-txt" value="" placeholder="Enter here."></p><div class="optWrapper"><ul class="options"><li class="opt selected hemant"><label>Saab</label></li><li class="opt hemant"><label>Opel</label></li><li class="opt"><label>Chrysler</label></li><li class="opt"><label>General Motors</label></li><li class="opt"><label>Ford</label></li><li class="opt"><label>Citroën</label></li><li class="opt"><label>Peugeot</label></li><li class="opt"><label>Renault</label></li><li class="opt"><label>Nissan</label></li><li class="group "><label>US Brands</label><ul><li class="opt disabled"><label>Plymouth
                                            </label></li></ul></li><li class="group "><label>French Brands</label><ul></ul></li><li class="group "><label>Italian brands</label><ul><li class="opt"><label>Fiat</label></li><li class="opt"><label>Alpha Romeo</label></li><li class="opt"><label>Lamborghini</label></li></ul></li><li class="group disabled"><label>German brands</label><ul><li class="opt disabled"><label>Audi</label></li><li class="opt disabled"><label>BMW</label></li><li class="opt disabled"><label>Volkswagen</label></li></ul></li><li class="opt"><label>Aston Martin</label></li><li class="opt"><label>Hyundai</label></li><li class="opt"><label>Mitsubishi</label></li></ul><p class="no-match"></p></div></div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="add-category">
                                    <label class="form-label">Select Sub Category</label>

                                    <!-- category adding popup -->
                                    <div class="form-group add-close-label" id="add-category-input-2" style="display: none;">
                                        <input type="text" class="form-control add-select-category" placeholder="Add your Category">
                                        <button class="add-button btn-add-2">Add</button>
                                        <button class="cancel-button btn-cancel-2">Cancel</button>
                                    </div>
                                    <!-- category adding popup end -->
                                    <svg onclick="openPopup2()" class="add-category-icon" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512" fill="#6A983C"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path>
                                    </svg>
                                </div>
                                <div class="col-md-12">
                                    <div class="SumoSelect" tabindex="0" role="button" aria-expanded="false"><select class="search_test SumoUnder" tabindex="-1">
                                        <option class="hemant" selected="" value="saab">Saab</option>
                                        <option class="hemant" value="opel">Opel</option>
                                        <option disabled="disabled" value="mercedez">Mercedez
                                        </option>
                                        <optgroup label="US Brands">
                                            <option value="chrysler">Chrysler</option>
                                            <option value="gm">General Motors</option>
                                            <option value="ford">Ford</option>
                                            <option disabled="disabled" value="plymouth">Plymouth
                                            </option>
                                        </optgroup>
                                        <optgroup label="French Brands">
                                            <option value="citroen">Citroën</option>
                                            <option value="peugeot">Peugeot</option>
                                            <option value="renault">Renault</option>
                                            <option value="nissan">Nissan</option>
                                        </optgroup>
                                        <optgroup label="Italian brands">
                                            <option value="fiat">Fiat</option>
                                            <option value="alpha-Romeo">Alpha Romeo</option>
                                            <option value="lamborghini">Lamborghini</option>
                                        </optgroup>
                                        <optgroup disabled="disabled" label="German brands">
                                            <option value="audi">Audi</option>
                                            <option value="bMW">BMW</option>
                                            <option value="volkswagen">Volkswagen</option>
                                        </optgroup>
                                        <option value="aston-martin">Aston Martin</option>
                                        <option value="hyundai">Hyundai</option>
                                        <option value="mitsubishi">Mitsubishi</option>
                                    </select><p class="CaptionCont SelectBox search" title=" Saab"><span> Saab</span><label><i></i></label><input type="text" class="search-txt" value="" placeholder="Enter here."></p><div class="optWrapper"><ul class="options"><li class="opt selected hemant"><label>Saab</label></li><li class="opt hemant"><label>Opel</label></li><li class="opt disabled"><label>Mercedez
                                        </label></li><li class="group "><label>US Brands</label><ul><li class="opt"><label>Chrysler</label></li><li class="opt"><label>General Motors</label></li><li class="opt"><label>Ford</label></li><li class="opt disabled"><label>Plymouth
                                            </label></li></ul></li><li class="group "><label>French Brands</label><ul><li class="opt"><label>Citroën</label></li><li class="opt"><label>Peugeot</label></li><li class="opt"><label>Renault</label></li><li class="opt"><label>Nissan</label></li></ul></li><li class="group "><label>Italian brands</label><ul><li class="opt"><label>Fiat</label></li><li class="opt"><label>Alpha Romeo</label></li><li class="opt"><label>Lamborghini</label></li></ul></li><li class="group disabled"><label>German brands</label><ul><li class="opt disabled"><label>Audi</label></li><li class="opt disabled"><label>BMW</label></li><li class="opt disabled"><label>Volkswagen</label></li></ul></li><li class="opt"><label>Aston Martin</label></li><li class="opt"><label>Hyundai</label></li><li class="opt"><label>Mitsubishi</label></li></ul><p class="no-match"></p></div></div>
                                </div>
                            </div>

                            <div class="wd-200 mg-b-30">
                                <label class="form-label">Select Updating Date</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <div class="">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"></path>
                                                <path d="M4 5.01h16V8H4z" opacity=".3"></path>
                                            </svg>
                                        </div>
                                    </div><input class="form-control fc-datepicker hasDatepicker" placeholder="MM/DD/YYYY" type="text" id="dp1705127708712">
                                </div>
                            </div>

                            <div class="mb-0">

                                <div class="add-category">
                                    <label class="form-label">Select Tag</label>

                                    <!-- category adding popup -->
                                    <div class="form-group add-close-label" id="add-category-input-3" style="display: none;">
                                        <input type="text" class="form-control add-select-category" placeholder="Add your Category">
                                        <button class="add-button btn-add-3">Add</button>
                                        <button class="cancel-button btn-cancel-3">Cancel</button>
                                    </div>
                                    <!-- category adding popup end -->
                                    <svg onclick="openPopup3()" class="add-category-icon" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512" fill="#6A983C"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path>
                                    </svg>
                                </div>

                                <select class="form-control select2 select2-hidden-accessible" data-placeholder="Choose Browser" multiple="" tabindex="-1" aria-hidden="true">
                                    <option value="Firefox">
                                        Firefox
                                    </option>
                                    <option value="Chrome selected">
                                        Chrome
                                    </option>
                                    <option value="Safari">
                                        Safari
                                    </option>
                                    <option selected="" value="Opera">
                                        Opera
                                    </option>
                                    <option value="Internet Explorer">
                                        Internet Explorer
                                    </option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 1551px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="
                                        Opera
                                    "><span class="select2-selection__choice__remove" role="presentation">×</span>
                                        Opera
                                    </li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-12 form-label">Select Country</label>
                                <div class="col-md-12">
                                    <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="false"><select name="somename" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                        <!--placeholder-->
                                        <option title="China product" value="china">China</option>

                                        <option value="india">India</option>
                                        <option value="bangladesh">Bangladesh</option>
                                    </select><p class="CaptionCont SelectBox" title=" China"><span> China</span><label><i></i></label></p><div class="optWrapper"><ul class="options"><li class="opt selected" title="China product"><label>China</label></li><li class="opt"><label>India</label></li><li class="opt"><label>Bangladesh</label></li></ul></div></div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label text-dark">Available Quantity</label>
                                <input type="number" class="form-control" placeholder="Number of Product">
                            </div>

                            <div class="form-group">
                                <label class="form-label text-dark">Public Price</label>
                                <input type="number" class="form-control" placeholder="Price of product">
                            </div>

                            <div class="form-group">
                                <label class="form-label text-dark">Distributor Price</label>
                                <input type="number" class="form-control" placeholder="Price for distributor">
                            </div>

                            <div class="form-group">
                                <label class="form-label text-dark">Discount Price</label>
                                <input type="number" class="form-control" placeholder="Price after discount">
                            </div>


                            <div class="card-footer ">
                                <a href="sweet-altert.html" class="btn btn-secondary">Save to Draft</a>
                                <a href="javascript:void(0)" class="btn btn-primary float-end">Publish
                                    Now</a>
                            </div>


                            <!-- popup for adding item -->



                        </div>
                    </form>
                </div>

                <!-- /Row -->

            </div>
        </div>
    </div>
    <!-- end app-content-->
</div>
@endsection