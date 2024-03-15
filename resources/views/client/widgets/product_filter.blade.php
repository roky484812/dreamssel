<div class="sideBar filterBox">
    <!-- language change button -->
    <div class="switchPhoneMenu">
        <div class="switch">
            <input id="language-toggle-Mbl" class="check-toggle check-toggle-round-flat" type="checkbox" />
            <label for="language-toggle-Mbl"></label>
            <span class="on">BN</span>
            <span class="off">EN</span>
        </div>
    </div>
    <!-- end -->
    <button class="sideBarCloseBtn" onclick="toggleSideMenuBar()">
    <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="Categories">
        <h3>Categories</h3>
        <ul>
            <li><a href="">Fassion <span>112</span></a></li>
            <li><a href="">Foot wear <span>112</span></a></li>
            <li><a href="">Electonics <span>112</span></a></li>
            <li><a href="">Cloths <span>112</span></a></li>
            <li><a href="">Others <span>112</span></a></li>
        </ul>
    </div>
    <div class="brands">
        <h3>Brands</h3>
        <form action="">
            <input class="filterCheckBox" type="checkbox" id="brand1" name="brand1" value="Bike">
            <label for="brand1"> Filter by brand name</label>
            <input class="filterCheckBox" type="checkbox" id="brand2" name="brand2" value="Car">
            <label for="brand2"> Filter by brand name</label>
            <input class="filterCheckBox" type="checkbox" id="brand3" name="brand3" value="Boat">
            <label for="brand3"> Filter by brand name</label>
            <input class="filterCheckBox" type="checkbox" id="brand4" name="brand4" value="Boat">
            <label for="brand4"> Filter by brand name</label>
            <input class="filterCheckBox" type="checkbox" id="brand5" name="brand5" value="Boat">
            <label for="brand5"> Filter by brand name</label>
        </form>
    </div>
    <!-- range start -->
    <div class="priceRange">
        <h3>Price</h3>
        <div class="slider">
            <div class="progress"></div>
        </div>
        <div class="range-input">
            <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
            <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
        </div>
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" value="2500">
            </div>
            <div class="separator">-</div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" value="7500">
            </div>
        </div>
        <div class="applyBtnBox">
            <button class="applyBtn">Apply</button>
            <button class="resetBtn">Reset</button>
        </div>
    </div>
</div>
<div class="overlay"></div>