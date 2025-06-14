<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmfinity-Shop-Categories</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&family=Croissant+One&family=Homemade+Apple&family=Poppins:wght@700&family=Titillium+Web:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cate.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-------Navbar Start------->
    <nav class="navbar">
        <a href="index.php"><img src="images/FARMFINITY.png"></a>
        <div class="nav-links" id="navLinks">
            <i class='bx bx-x' id="X" onclick="hideMenu()"></i>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cate.php">Shop</a></li>
                <li><a href="#farms">Farms</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#footer">About</a></li>
                <li><a href="#footer">Help</a></li>
            </ul>
        </div>
        <!----nav icons---->
        <div class="icons">
            <div class="bx bx-search-alt search" id="search"></div>
            <div class='bx bxs-cart' id="cart"></div>
            <a href="user.php"><div class='bx bxs-user' id="user"></div></a>
            <div class='bx bx-menu-alt-right' id="menu" onclick="showMenu()"></div>
        </div>
        <!----search form---->
        <form class="search-form">
            <input type="search" id="search-box" placeholder="Search Here..........">
            <label for="search-box" class="bx bx-search-alt"></label>
        </form>

        <!-----Cart----->
        <div class="cart">
            <div class="box">
                <i class='bx bxs-trash'></i>
                <img src="images/tomato.png">
                <div class="content">
                    <h3>Tomato</h3>
                    <span class="price">৳ 48/=</span>
                    <span class="quantity">Qty : 500 gm</span>
                </div>
            </div>

            <div class="box">
                <i class='bx bxs-trash'></i>
                <img src="images/eggs.png">
                <div class="content">
                    <h3>Egg</h3>
                    <span class="price">৳ 140/=</span>
                    <span class="quantity">Qty : 12 pcs</span>
                </div>
            </div>

            <div class="box">
                <i class='bx bxs-trash'></i>
                <img src="images/red-apple.png">
                <div class="content">
                    <h3>Apple</h3>
                    <span class="price">৳ 365/=</span>
                    <span class="quantity">Qty : 1 kg</span>
                </div>
            </div>

            <div class="total"> Total : ৳ 553/=</div>
            <a href="#" class="btn-ck">Checkout</a>
        </div>
    </nav>
    <!-------Navbar End------->


    
    <!--------part 2_Categories------->
    <section class="categories" id="categories">
        <h1 class="heading">Categories</h1>

        <div class="box-container">
            <div class="box">
                <img src="images/cate-1.jpg">
                <h3>Fresh and Organic<br>Fruits</h3>
                <p>Avocado, Papaya, Apple, Grapefruits.....</p>
                <a href="fruits.php" class="btn-all">Visit To Buy</a>
            </div>

            <div class="box">
                <img src="images/cate-2.jpg">
                <h3>Fresh and Organic<br>Vegetables</h3>
                <p>Brocoli, Capsicum, Carrot, Spinach.....</p>
                <a href="veg.php" class="btn-all">Visit To Buy</a>
            </div>

            <div class="box">
                <img src="images/cate-3.jpg">
                <h3>Fresh<br>Meats & Fishs</h3>
                <p>Fishs, Goat meats, Cow meats, chickens.....</p>
                <a href="meats.php" class="btn-all">Visit to buy</a>
            </div>

            <div class="box">
                <img src="images/cate-4.jpg">
                <h3>Organic<br>Dairy & Eggs</h3>
                <p>Cow milks, Goat milks, Eggs, Duck eggs.....</p>
                <a href="dairy.php" class="btn-all">Visit to buy</a>
            </div>
        </div>
    </section>
    <!--------part 2_Categories------->


      <!--------part 8_Footer------->
  <section class="footer" id="footer">
    <div class="box-container">
        <div class="box">
            <h2>FARMFINITY<i class='bx bxs-store'></i></h2>
            <p>Feel Free To Follow Us On Our Social Media Handlers All 
               The Links Are Given Below</p>
            <div class="share">
                    <a href="" class="bx bxl-facebook"></a>
                    <a href="" class="bx bxl-twitter"></a>
                    <a href="" class="bx bxl-instagram"></a>
                    <a href="" class="bx bxl-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h2>Contact Info</h2>
            <a href="#" class="links"><i class="bx bxs-phone"></i> +8801822648842</a>
            <a href="#" class="links"><i class="bx bxs-phone"></i> +8801822648842</a>
            <a href="#" class="links"><i class="bx bxs-envelope"></i> info@example.com</a>
            <a href="#" class="links"><i class="bx bxs-map"></i> Dhaka, Bangladesh</a>
        </div>

        <div class="box">
            <h2>Quick Links</h2>
            <a href="index.php" class="links"><i class='bx bxs-right-arrow-alt'></i> Home</a>
            <a href="cate.php" class="links"><i class='bx bxs-right-arrow-alt'></i> Shop</a>
            <a href="#footer" class="links"><i class='bx bxs-right-arrow-alt'></i> About</a>
            <a href="#footer" class="links"><i class='bx bxs-right-arrow-alt'></i> Help</a>
        </div>

        <div class="box">
            <h2>Newsletter</h2>
            <p> Login Or Create Account For Latest Update</p>
            <a href="user.php" class="btn-all">Login/Create</a>
        </div>
    </div>

   <div class="credit">Created By <span>The Titans</span> | All Rights Reserved</div>

  </section>
  <!--------part 8_Footer------->


    <!----Javascript work---->
    <script src="js/script.js"></script>

</body>
</html>