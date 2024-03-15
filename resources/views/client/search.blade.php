@extends('layouts.client.client')
@section('content')
    <!-- mid content -->
    <div class="midContent">
        @include('client.widgets.product_filter')
        <!-- filter end -->
        <div class="svCardBox">
            <div class="svCard">
                <div class="svDesWraper">
                    <div class="svImgSection">
                        <img src="assets/images/product3.svg" alt="pic">
                    </div>
                    <div class="svDesSection">
                        <h3>Product title</h3>
                        <div class="svProductDetails">
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Category:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>Sharee</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Stock:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>InStock (100)</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Date:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Country:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p><span class="regional-tag">IND</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="svPriceSection">
                    <div class="svProDesPriceBox">
                        <div class="desPriceBox">
                            <h2 class="price">1.48 BDT</h2>
                            <div class="closePriceAndCategory">
                                <del class="crossed-price">180</del>
                            </div>
                        </div>
                        <div class="desQuantity">
                            <form class="quantityForm" role="search">
                                <input class="quanInputBox" type="text" placeholder="1..">
                                <!-- drop down -->
                                <div class="quantityDropdown">
                                    <button class="pscBtn" type="button">
                                    PSC <span><i class="fa-solid fa-angle-down"></i></span>
                                    </button>
                                </div>
                                <!-- drop down end -->
                            </form>
                        </div>
                        <div class="desBuyBtn">
                            <button class="buy-now-button">
                                Buy now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="svCard">
                <div class="svDesWraper">
                    <div class="svImgSection">
                        <img src="assets/images/img.jpeg" alt="pic">
                    </div>
                    <div class="svDesSection">
                        <h3>Product title</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <div class="svProductDetails">
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Category:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>Sharee</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Stock:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>InStock (100)</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Date:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Country:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p><span class="regional-tag">IND</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="svPriceSection">
                    <div class="svProDesPriceBox">
                        <div class="desPriceBox">
                            <h2 class="price">1.48 BDT</h2>
                            <div class="closePriceAndCategory">
                                <del class="crossed-price">180</del>
                            </div>
                        </div>
                        <div class="desQuantity">
                            <form class="quantityForm" role="search">
                                <input class="quanInputBox" type="text" placeholder="1..">
                                <!-- drop down -->
                                <div class="quantityDropdown">
                                    <button class="pscBtn" type="button">
                                    PSC <span><i class="fa-solid fa-angle-down"></i></span>
                                    </button>
                                </div>
                                <!-- drop down end -->
                            </form>
                        </div>
                        <div class="desBuyBtn">
                            <button class="buy-now-button">
                            Buy now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="svCard">
                <div class="svDesWraper">
                    <div class="svImgSection">
                        <img src="assets/images/img.jpeg" alt="pic">
                    </div>
                    <div class="svDesSection">
                        <h3>Product title</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <div class="svProductDetails">
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Category:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>Sharee</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Stock:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>InStock (100)</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Date:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Country:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p><span class="regional-tag">IND</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="svPriceSection">
                    <div class="svProDesPriceBox">
                        <div class="desPriceBox">
                            <h2 class="price">1.48 BDT</h2>
                            <div class="closePriceAndCategory">
                                <del class="crossed-price">180</del>
                            </div>
                        </div>
                        <div class="desQuantity">
                            <form class="quantityForm" role="search">
                                <input class="quanInputBox" type="text" placeholder="1..">
                                <!-- drop down -->
                                <div class="quantityDropdown">
                                    <button class="pscBtn" type="button">
                                    PSC <span><i class="fa-solid fa-angle-down"></i></span>
                                    </button>
                                </div>
                                <!-- drop down end -->
                            </form>
                        </div>
                        <div class="desBuyBtn">
                            <button class="buy-now-button">
                            Buy now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="svCard">
                <div class="svDesWraper">
                    <div class="svImgSection">
                        <img src="assets/images/img.jpeg" alt="pic">
                    </div>
                    <div class="svDesSection">
                        <h3>Product title</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        <div class="svProductDetails">
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Category:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>Sharee</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Stock:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>InStock (100)</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Date:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="productAttributeItem">
                                <div class="descriptionTitle">
                                    <p>Country:</p>
                                </div>
                                <div class="descriptionBox">
                                    <p><span class="regional-tag">IND</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="svPriceSection">
                    <div class="svProDesPriceBox">
                        <div class="desPriceBox">
                            <h2 class="price">1.48 BDT</h2>
                            <div class="closePriceAndCategory">
                                <del class="crossed-price">180</del>
                            </div>
                        </div>
                        <div class="desQuantity">
                            <form class="quantityForm" role="search">
                                <input class="quanInputBox" type="text" placeholder="1..">
                                <!-- drop down -->
                                <div class="quantityDropdown">
                                    <button class="pscBtn" type="button">
                                    PSC <span><i class="fa-solid fa-angle-down"></i></span>
                                    </button>
                                </div>
                                <!-- drop down end -->
                            </form>
                        </div>
                        <div class="desBuyBtn">
                            <button class="buy-now-button">
                            Buy now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- populer product section -->
    <div class="populerProductBox">
        <div class="header-category">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>Populer's</h6>
            </div>
        </div>
        <div class="our-feature-product-header">
            <h1>Populer Products</h1>
        </div>
        <div class="PopulerProducts owl-carousel">
            <!-- product card start -->
            <div class="populerItem ">
                <div class="wrapper">
                    <div class="pic-wrapper">
                        <div class="negative-percentage">
                            <p>-36%</p>
                        </div>
                        <div class="product-pic">
                            <img src="assets/images/img.jpeg" alt="" />
                        </div>
                    </div>
                    <div class="title-price-wrapper">
                        <h3 class="product-title">Product Title</h3>
                        <div class="rate-buy-now-wrapper">
                            <div class="price-wrapper">
                                <h2 class="price">1.48 ৳</h2>
                                <div class="closePriceAndCategory">
                                    <del class="crossed-price">180</del>
                                    <div class="regional-tag">
                                        <p>IND</p>
                                    </div>
                                </div>
                            </div>
                            <button class="buy-now-button">Buy now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
