@extends('layouts.client.index', ['title' => 'About Us'])
@section('content')

    <div class="container">
        <div class="path-bar">
            <div class="full-path">
                <p class="inactive-path">Home /</p>
                <span class="active-path">About</span>
            </div>
        </div>
    </div>

    <!-- company details start here -->
    <div class="container">
        <div class="companyDetailsBox">
            <div class="imgBox">
                <img src="../assets/companyStory.jpg" alt="">
            </div>
            <div class="storyBox">
                <h1>Our Story</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident laborum vero quaerat. Et quia
                    aliquam voluptas eos quo laudantium dignissimos perspiciatis mollitia quaerat officiis, enim harum
                    qui ipsum animi ad commodi ipsam. Nesciunt ipsa aut dolor culpa aliquid distinctio similique
                    consequatur magni possimus, voluptate a voluptatem nam voluptas veritatis totam!
                </p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus minus hic quae ducimus quasi rem
                    ex numquam? Enim quod ipsum debitis voluptas quaerat, dolorem sunt sequi, praesentium magni soluta
                    molestias, non eligendi minima fugit nulla ipsam laudantium eveniet nihil officia architecto
                    deserunt nam excepturi veritatis! Corrupti voluptates aliquam rerum, eum repellat fugit, numquam
                    dignissimos delectus at impedit ipsum magnam ullam nobis reprehenderit officiis. Molestiae,
                    voluptatem quaerat voluptas, cumque mollitia aut, tempora sequi quidem id harum suscipit enim rem
                    incidunt odio obcaecati ad deleniti doloremque voluptatibus! Maxime repellat iusto perferendis quo,
                    aliquid aperiam praesentium, quos sunt eum saepe rem esse! Itaque.</p>
            </div>
        </div>
    </div>


    <!-- viewer counting details -->
    <div class="container">
        <div class="addvartiseBox viewCounting">
            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-store"></i></div>
                <h4>22K</h4>
                <p>Sellers active our site</p>
            </div>

            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-handshake"></i></div>
                <h4>40K</h4>
                <p>Monthly product sale</p>
            </div>

            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-cart-flatbed-suitcase"></i></div>
                <h4>60K</h4>
                <p>Customers active in our site</p>
            </div>

            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-sack-dollar"></i></div>
                <h4>30K</h4>
                <p>Annual gross of our site</p>
            </div>
        </div>
    </div>







    <!-- advartisement section -->

    <div class="container">
        <div class="addvartiseBox">
            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-truck"></i></div>
                <h4>Free and Fast Delivery</h4>
                <p>Free Delivery for all order over 10000</p>
            </div>

            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-headset"></i></div>
                <h4>24/7 Customer Service</h4>
                <p>Friendly 24/7 Customer Support</p>
            </div>

            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-shield-heart"></i></div>
                <h4>Money Back Guarantee</h4>
                <p>We return money within 30 days</p>
            </div>
        </div>
    </div>



@endsection