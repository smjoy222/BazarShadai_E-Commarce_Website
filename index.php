<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bazar Shadai</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&family=Croissant+One&family=Homemade+Apple&family=Poppins:wght@700&family=Roboto&family=Titillium+Web:wght@900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMt23cez/3paNdF+2z5l5d1j7x8e5b6c9a4p6k" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body>
    <!-------Navbar Start------->
    <nav class="navbar">
        <a href="index.php" class="logo"><img src="images/logo.png"><span>Bazar Shadai</span></a>
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
            <a href="user.html"><div class='bx bxs-user' id="user"></div></a>
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

    <!-------Header start------->
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <!------Slide 2------->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>We are Bazar Shadai</span>
                    <h1>Your One Stop Shop<br>for Fresh Produce</h1>
                    <a href="#" class="btn">Shop Now<i class="bx bx-right-arrow-alt"></i></a>
                </div>
                <img src="images/logo.png"alt="">
            </div>
            <!------Slide 2------->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>We are Bazar Shadai</span>
                    <h1>Your One Stop Shop<br>for Fresh Produce</h1>
                    <a href="#" class="btn">Shop Now<i class="bx bx-right-arrow-alt"></i></a>
                </div>
                <img src="images/logo.png"alt="">
            </div>
            <!------Slide 3------->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>We are Bazar Shadai</span>
                    <h1>Your One Stop Shop<br>for Fresh Produce</h1>
                    <a href="#" class="btn">Shop Now<i class="bx bx-right-arrow-alt"></i></a>
                </div>
                <img src="images/logo.png"alt="">
            </div>
            <!------Slide 4------->
            <div class="swiper-slide container">
                <div class="home-text">
                    <span>We are Bazar Shadai</span>
                    <h1>Your One Stop Shop<br>for Fresh Produce</h1>
                    <a href="#" class="btn">Shop Now<i class="bx bx-right-arrow-alt"></i></a>
                </div>
                <img src="images/logo.png"alt="">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    <!------Header End-------->
    </section>
    <!------End of front page------>


    <!--------part 2_Categories------->
    <section class="categories">
        <h1 class="heading">Categories</h1>

        <div class="box-container">
            <div class="box">
                <img src="images/cate-1.jpg">
                <h3>Fresh and Organic<br>Fruits</h3>
                <p>Avocado, Papaya, Apple, Grapefruits.....</p>
                <a href="fruits.html" class="btn-all">Visit To Buy</a>
            </div>

            <div class="box">
                <img src="images/cate-2.jpg">
                <h3>Fresh and Organic<br>Vegetables</h3>
                <p>Brocoli, Capsicum, Carrot, Spinach.....</p>
                <a href="veg.html" class="btn-all">Visit To Buy</a>
            </div>

            <div class="box">
                <img src="images/cate-3.jpg">
                <h3>Fresh<br>Meats & Fishs</h3>
                <p>Fishs, Goat meats, Cow meats, chickens.....</p>
                <a href="#" class="btn-all">Visit to buy</a>
            </div>

            <div class="box">
                <img src="images/cate-4.jpg">
                <h3>Organic<br>Dairy & Eggs</h3>
                <p>Cow milks, Goat milks, Eggs, Duck eggs.....</p>
                <a href="#" class="btn-all">Visit to buy</a>
            </div>
        </div>
    </section>
    <!--------part 2_Categories------->



    <!--------part 3_Featured Products------->
    <section class="products">
        <h1 class="heading">Featured Products</h1>

            <div class="container">
                <div class="box">
                    <img src="images/anar.png">
                    <h1>Pomegranate (Anar)</h1>
                    <div class="price">৳ 335/=<p>2 pcs</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="images/avocado.png">
                    <h1>Avocado</h1>
                    <div class="price">৳ 740/=<p>700 gm</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="images/gajor.png">
                    <h1>Carrot (Gajor)</h1>
                    <div class="price">৳ 48/=<p>500 gm</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="images/kumra.png">
                    <h1>Sweet Pumpkin (Mishti Kumra)</h1>
                    <div class="price">৳ 48/=<p>1 kg</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="images/chingri.png">
                    <h1>Shrimp (Bagda Chingri)</h1>
                    <div class="price">৳ 390/=<p>500 gm</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="images/beef.png">
                    <h1>Beef Boneless</h1>
                    <div class="price">৳ 490/=<p>500 gm</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="images/eggs.png">
                    <h1>Chickhen Eggs</h1>
                    <div class="price">৳ 140/=<p>12 pcs</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>

                <div class="box">
                    <img src="images/milk.png">
                    <h1>Cow Milk</h1>
                    <div class="price">৳ 90/=<p>1 ltr</p></div>
                    <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Buy Now</a>
                    </div>
                    <div class="button">
                        <a href="#" class="btn-all">Add to cart</a>
                    </div>
                </div>
            </div>

    </section>
 <!--------part 3_Featured Products------->



 <!--------part 4_Offer------->
 <section class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="images/offer.png" class="offer-img">
            </div>
            <div class="col-2">
                <p>Save up to</p>
                <h1>30%</h1>
                <p>On Seasonal vegetables and Fruits</p>
                <div>
                    <small>To get the offer Buy now From Farmfinity</small>
                </div>
                <div>
                <a href="cate.html" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>
</section>
 <!--------part 4_Offer------->

 <!--------part 5_Farms------->
 <section class="farms" id="farms">
    <h1 class="heading">Top Enlisted Farms</h1>

    <div class="box-container">
        <div class="box">
            <img src="images/farm2.png">
            <h3>RSF Agro Industries</h3>
            <p>Mainly Polpular for Vegetables.....</p>
            <a href="" class="btn-all">Read More</a>
        </div>

        <div class="box">
            <img src="images/farm3.png">
            <h3>Fatima Agro and dairy</h3>
            <p>One of the Dairy farm that.....</p>
            <a href="" class="btn-all">Read More</a>
        </div>

        <div class="box">
            <img src="images/farm4.png">
            <h3>Pal's Dragon Fruit Farm</h3>
            <p>Mainly Famous for dragon fru....</p>
            <a href="#" class="btn-all">Read More</a>
        </div>

        <div class="box">
            <img src="images/farm1.png">
            <h3>Ghanis Foods and Farms</h3>
            <p>Various Fishs are come from......</p>
            <a href="#" class="btn-all">Read More</a>
        </div>
    </div>
</section>
 <!--------part 5_Farms------->


 <!--------part 6_Features------->
 <section class="features" id="features">
    <h1 class="heading">Features</h1>

    <div class="box-container">
        <div class="box">
            <img src="images/feature1.png">
            <h3>Fresh Farm Foods</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia tenetur perferendis, placeat eos quo repellat? Beatae explicabo</p>
            <a href="" class="btn-all">Read More</a>
        </div>

        <div class="box">
            <img src="images/feature2.png">
            <h3>Free Delivery</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia tenetur perferendis, placeat eos quo repellat? Beatae explicabo</p>
            <a href="" class="btn-all">Read More</a>
        </div>

        <div class="box">
            <img src="images/feature3.png">
            <h3>Cash On Delivery</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia tenetur perferendis, placeat eos quo repellat? Beatae explicabo</p>
            <a href="#" class="btn-all">Read More</a>
        </div>
    </div>
</section>
 <!--------part 6_Features------->


 <!--------part 7_review------->
 <section class="reviews">
    <h1 class="heading">Reviews</h1>

    <div class="box-container">
        <div class="box">
            <i class='bx bxs-quote-left'></i>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia tenetur perferendis</p>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half' ></i>
            </div>
            <img src="images/pic-1.png">
            <h3>John Deo</h3>
        </div>

        <div class="box">
            <i class='bx bxs-quote-left'></i>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia tenetur perferendis</p>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half' ></i>
            </div>
            <img src="images/pic-2.png">
            <h3>Sean Parker</h3>
        </div>

        <div class="box">
            <i class='bx bxs-quote-left'></i>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia tenetur perferendis</p>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half' ></i>
            </div>
            <img src="images/pic-3.png">
            <h3>Mike Smith</h3>
        </div>
    </div>
</section>
 <!--------part 7_review------->


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
            <a href="index.html" class="links"><i class='bx bxs-right-arrow-alt'></i> Home</a>
            <a href="cate.html" class="links"><i class='bx bxs-right-arrow-alt'></i> Shop</a>
            <a href="#footer" class="links"><i class='bx bxs-right-arrow-alt'></i> About</a>
            <a href="#footer" class="links"><i class='bx bxs-right-arrow-alt'></i> Help</a>
        </div>

        <div class="box">
            <h2>Newsletter</h2>
            <p> Login Or Create Account For Latest Update</p>
            <a href="user.html" class="btn-all">Login/Create</a>
        </div>
    </div>

   <div class="credit">Created By <span>The Titans</span> | All Rights Reserved</div>

  </section>
  <!--------part 8_Footer------->

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!----Javascript work---->
    <script src="js/script.js"></script>
    
  <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>