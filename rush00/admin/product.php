<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css"  href="../style/product.css">
    <link rel="stylesheet" href="style/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins|Quicksand&display=swap" rel="stylesheet">
    <title>1337 E_Store</title>
</head>
<body>
    <div id="wrapper">
        <div id="top-header">
            <div id="social-media-btns">
                <ul>
                    <li><a href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div id="top-menu-right">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div id="menu-container">
            </div>
            <div id="top-header-right">
                <div id="search-bar" class="top-header-float-right">
                    <div>
                        <input type="text" name="search" placeholder="Search">
                        <button name="search-btn" id="search-btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div id="sign-btns" class="top-header-float-right">
                    <div id="sign-in-btn"><a href="">Sign in</a></div>
                    <span> / </span>
                    <div id="sign-up-btn"><a href="">Sing up</a></div>
                </div>
                <div id="cart-btn" class="top-header-float-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>
           
        </div>
        <div id="tabs">
            <div class="hr"></div>
            <div id="header">
                <div id="header-title"><a href="./index.html"><span id="header-title-1337">1337</span> <span id="header-title-eshop">E_Shop</span></a></div>
                <div id="tabs-row">
                    <ul>
                        <li><a href="./index.html">HOME</a></li>
                        <li><a href="./show.html">NEW</a></li>
                        <li><a href="./show.html">SHOW ALL</a></li>
                        <li><a href="./show.html">CATEGORIES</a></li>
                        <li><a href="./about.html">ABOUT</a></li>
                    </ul>
                </div>
            </div>
            <div class="hr"></div>
        </div>
        <div id="prod-det">
            <div class="section-title"><a href="">Product Details</a></div>
            <div id="prod-container">
                <div id="prod-top-section">
                    <div id="prod-images" class="prod-sides">
                        <img class="prod-image" src="https://via.placeholder.com/200">
                        <img class="prod-image" src="https://via.placeholder.com/200">
                        <img class="prod-image" src="https://via.placeholder.com/200">
                        <img class="prod-image" src="https://via.placeholder.com/200">
                        <div id="prod-image-controllers">
                            <button id="prod-image-controller-left" onclick="plusDivs(-1)">&#10094;</button>
                            <div>
                                <div class="prod-image-indicator" onclick="currentDiv(1)"></div>
                                <div class="prod-image-indicator" onclick="currentDiv(2)"></div>
                                <div class="prod-image-indicator" onclick="currentDiv(3)"></div>
                                <div class="prod-image-indicator" onclick="currentDiv(4)"></div>
                            </div>
                            <button id="prod-image-controller-right" onclick="plusDivs(+1)">&#10095;</button>
                            
                        </div>
                    </div>
                    <div id="prod-details" class="prod-sides">
                        <div id="prod-title">Product title</div>
                        <div id="prod-time"><i class="fa fa-clock-o" aria-hidden="true"></i>Published: 10/12/2019 20:30</div>
                        <div id="prod-cat"><i class="fa fa-table" aria-hidden="true"></i>Categorie: <a href="">title</a></div>
                        <div id="prod-stock"><i class="fa fa-archive" aria-hidden="true"></i>In Strock: 200 unit</div>
                        <div id="prod-price-container">Price: <span id="prod-price">99$</span></div>
                        <div id="prod-command">
                            <div id="prod-quantite">
                                <form action="" method="POST">
                                    <input type="number" name="com-quantite" id="com-quantite" placeholder="Quantite">
                                    <input type="submit" name="com-submit" id="com-submit" value="Add to cart">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prod-bottom-section">
                    <div id="prod-desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac felis a felis molestie convallis. Aliquam et erat felis. In placerat non eros ac ultricies. Praesent dictum tempus ligula, eget viverra diam aliquet sed. In hac habitasse platea dictumst. In varius accumsan accumsan. Cras pulvinar justo id sapien tincidunt ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut hendrerit enim in lorem lacinia egestas. Praesent semper risus aliquet sagittis cursus. Integer in tortor ut dui sollicitudin tincidunt.
                                </p>
                           <p> Donec malesuada quam id augue malesuada, consequat aliquam velit sodales. Donec mattis, odio et ultrices semper, enim orci viverra odio, ac scelerisque justo magna id eros. Sed consectetur a massa et maximus. Suspendisse tincidunt pellentesque pharetra. Suspendisse dignissim, diam quis viverra gravida, tellus magna pellentesque dolor, vel cursus lectus erat vel ligula. Mauris non sapien interdum, posuere sapien sed, hendrerit lorem. Morbi in dapibus justo. Nulla hendrerit nulla et euismod pellentesque. Suspendisse vulputate nisi sit amet dui venenatis feugiat. Aenean eros mauris, molestie ut sodales id, porttitor ac quam. Etiam lectus elit, aliquet eu ante tempus, imperdiet volutpat mi. In nec luctus lacus, elementum euismod purus. Etiam dolor neque, rhoncus eu blandit eu, dictum non libero. Donec porttitor odio quis sollicitudin luctus. Etiam ac dui at lorem porta volutpat id porta diam. Donec auctor egestas viverra.
                            </p>
                        </div>
                </div>
                <div class="hr"></div>
            </div>
        </div>
        <div id="footer">
            <div class="section-title"><a href="">About</a></div>
            <div id="footer-inner">
                <div id="footer-inner-1">
                    <div class="footer-inner-title">Website Map</div>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">New</a></li>
                        <li><a href="">Show All</a></li>
                        <li><a href="">Categories</a></li>
                        <li><a href="">About</a></li>
                    </ul>
                </div>
                <div id="footer-inner-2">
                    <div class="footer-inner-title">Our Social Media</div>
                    <ul>
                        <li><a href="https://www.twitter.com"><i style="color:lightskyblue" class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                        <li><a href="https://www.facebook.com"><i style="color:dodgerblue" class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                        <li><a href="https://www.youtube.com"><i  style="color:red" class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a></li>
                    </ul>
                </div>
                <div id="footer-inner-3">
                    <div class="footer-inner-title">Our Partners</div>
                    <ul>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div id="footer-inner-4">
                    <div class="footer-inner-title">&copy; Copyright 2019</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
        showDivs(slideIndex += n);
        }

        function currentDiv(n) {
        showDivs(slideIndex = n);
        }

        function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("prod-image");
        var dots = document.getElementsByClassName("prod-image-indicator");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" prod-image-indicator-active", "");
        }
        x[slideIndex-1].style.display = "inline";  
        dots[slideIndex-1].className += " prod-image-indicator-active";
        }
    </script>
</body>
</html>