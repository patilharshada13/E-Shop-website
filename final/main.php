<?php

$con=mysqli_connect('localhost','root','','task3');
session_start();

if(mysqli_connect_error()){
    echo "<script>alert('can not connect to data base');</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One Page Ad</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #000;
    background-color: #000;
  }

  .container {
    padding: 20px;
  }
 
  
  h1 {
    text-align: center;
            font-size: 50px;
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            -webkit-background-clip: text;
            color: transparent;
            font-family: 'Gambetta', serif;
            font-variation-settings: "wght" 311;
            transition: 700ms ease;
            letter-spacing: 2px;
            margin-bottom: 0.8rem;         
        }

  .horizontal-box {
    background-color: #3b444b;
    padding: 20px;
    margin-bottom: 40px;
  }
  .horizontal-box h2{
    color: white;
  }
  .content {
    text-align: center;
  }

  .features {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
  }

  .circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    color: #fff;
    border-radius: 50%;
    text-align: center;
    cursor: pointer;
    border: 3px solid #fff;
    position: relative;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .circle img, .circle video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    display: none;
  }

  .circle.active img, .circle.active video {
    display: block;
  }

  .circle .add-story-icon {
    position: absolute;
    bottom: 2px;
    font-size: 18px;
    display: block;
    right: 10%;
  }

  .circle.active .add-story-icon {
    display: none;
  }

  .shop-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    padding: 20px 0;
  }

  .shop-item {
    background-color: #3b444b;
    border: 4px solid #ddd;
    border-radius: 60px;
    text-align: center;
    padding: 5px;
    
  }

  .shop-item img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-top: 10%;
  }

  .shop-item button {
    margin-top: 1px;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
  }

  .shop-item button:hover {
    background-color:green;
  }

  .rectangle-box {
    width: 90%;
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    color: #fff;
    text-align: center;
    padding: 10px;
    margin: 20px auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .shop-dropdown {
    margin-left: 10px;
    padding: 5px;
    border: none;
    border-radius: 4px;
  }
  
    .nav {
      bottom: 0;
      position: fixed;
      width: 100%;
      height: 55px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
      background-color: #333;
      overflow-x: auto;
      display: flex;
    }
  
    .nav-link {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex-grow: 1;
      min-width: 50px;
      overflow: hidden;
      white-space: nowrop;
      font-family: sans-serif;
      font-size: 14px;
      color:#ddd
     } 
     
     .nav-link:hover {
      color: #007bff;
    }

    .nav-link:active {
      color: #007bff;
    }
    
  /* Modal styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.9);
  }

  .modal-content {
    position: relative;
    margin: auto;
    top: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: flex-end; /* Align items to the end (bottom) of the container */
    justify-content: center;
    flex-direction: column;
  }

  .modal-content img, .modal-content video {
    max-width: 100%;
    max-height: 80%; /* Limit height to 80% of the container */
  }

  .close {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
  }

  .back-icon {
  position: absolute;
  top: 10px;
  left: 20px;
  color: #000;
  font-size: 40px;
  font-weight: bold;
  cursor: pointer;
  z-index:1001; /* Ensure the icon appears above the modal content */
}

.back-icon:hover {
  font-size: 50px; /* Increase size on hover */
  display: block;
}

.carousel-item img {
  width: 100%;
  height: 400px; /* Set a fixed height for the images */
  object-fit: cover; /* Ensure the images cover the area without distortion */
}
.carousel-caption h5, p{
    color: #000;
}
.shopc h3, p{
  color: white;
}
</style>
</head>
<body>
  <div class="container">
    <section class="horizontal-box">
      <div class="content">
        <h2><?php
          echo "E-SHOP :  ".$_SESSION['taluka'];?></h2>
      </div>
    </section>
  
    <section class="features">
       <a href="local.php" div class="circle"><span>Local</span></a> 
        
        
        <!-- <img id="local-story" alt="Local Story" onclick="showFullScreen('local')">
        <video id="local-story-video" controls style="display:none" onclick="showFullScreen('local')"></video> -->
        
        <!-- <span>Local</span> -->
      
      <a href="area.php" div class="circle"><span>Area</span></a> 
        <!-- <img id="area-story" src="" alt="Area Story" onclick="showFullScreen('area')">
        <video id="area-story-video" controls style="display:none" onclick="showFullScreen('area')"></video>
         -->
        <!-- <span>Area</span> -->
      
        <a href="shop.php" div class="circle"><span>Shop</span></a> 
        <!-- <img id="shop-story" src="" alt="Shop Story" onclick="showFullScreen('shop')">
        <video id="shop-story-video" controls style="display:none" onclick="showFullScreen('shop')"></video>
       
        <span>Shop</span> -->
      
        <a href="promotion.php" div class="circle"><span>Promotion</span></a> 
        <!-- <img id="promotion-story" src="" alt="Promotion Story" onclick="showFullScreen('promotion')">
        <video id="promotion-story-video" controls style="display:none" onclick="showFullScreen('promotion')"></video>
        
        <span>Promotion</span> -->
      
    </section>
  </div>
  
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="baner02.jpg" class="d-block w-100" alt="Slide 1">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cloth Brand</h5>
          <p>Get the best deals now!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="banner01.jpg" class="d-block w-100" alt="Slide 2">
        <div class="carousel-caption d-none d-md-block">
          <h5>Agri Culture</h5>
          <p>Check out our latest offers.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="banner03.jpg" class="d-block w-100" alt="Slide 3">
        <div class="carousel-caption d-none d-md-block">
          <h5>Home appliance</h5>
          <p>Don't miss out on our special discounts.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <div class="rectangle-box">
    <p>Select Shop</p>
    <select class="shop-dropdown" onchange="showShopDetails()">
      <option value="">Select Shop</option>
      <option value="shop1">Cloth</option>
      <option value="shop2">Electric</option>
      <option value="shop3">Mobile</option>
      <option value="shop4">Agri Culture</option>
    </select>
  </div>
  
  <div id="shop-items" class="shop-grid"></div>
  
  <div id="shop-details" class="shopc">
    <!-- Placeholder content for shop details -->
    <h3>Shop Details</h3>
    <p>Select a shop from the dropdown to see details.</p>
  </div>
  <div class="shop-grid">
    <div class="shop-item">
      <img src="agri1.jpg" alt="Product Image">
      <p>agriculture</p>
      <button>visit</button>
    </div>
    <div class="shop-item">
      <img src="mobile1.jpg" alt="Product Image">
      <p>Electronics</p>
      <button>visit</button>
    </div>
    <div class="shop-item">
      <img src="cloths1.jpg" alt="Product Image">
      <p>Cloth Factory</p>
      <button>visit</button>
    </div>
  </div>
<br><br>
  <!-- Navbar at the bottom of the page -->
        <nav class="nav">
        <a href="#" class="nav-link link-active">
          <i class='bx bx-home-alt nav__icon'></i>
          <span class="nav-text">Home</span>
        </a>
        <a href="#" class="nav-link link-active">
          <i class='bx bxs-shopping-bags'></i>
          <span class="nav-text">New Product</span>
        </a>
        <a href="#" class="nav-link link-active">
          <i class='bx bx-news'></i>
          <span class="nav-text">News</span>
        </a>
        <a href="#" class="nav-link link-active">
          <i class='bx bxs-message-add'></i>
          <span class="nav-text">New Offers</span>
        </a>
    
  </nav>
  <!-- Modal for displaying full screen image/video -->
  <div id="story-modal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <span class="back-icon" onclick="goBack()">&#x2190;</span> <!-- Back icon -->
    <div class="modal-content">
      <img id="modal-image" src="" alt="Story Image">
      <video id="modal-video" controls style="display:none"></video>
    </div>
  </div>
  
  
  <input type="file" id="story-input" accept="video/*,image/*" style="display:none" onchange="uploadStory(event)">
  
  <script>
    var storyImages = []; // Array to store uploaded story images
    var currentIndex = 0; // Index to keep track of the current story image

    function visitShop(shopName) {
      alert('Visiting ' + shopName);
    }
    function showShopDetails() {
      var selectElement = document.querySelector('.shop-dropdown');
      var selectedValue = selectElement.value;
      var shopItemsContainer = document.getElementById('shop-items');
      var shopDetailsContainer = document.getElementById('shop-details');

      // Clear previous content
      shopItemsContainer.innerHTML = '';
      shopDetailsContainer.innerHTML = '';

      // Shop items data
      var shopData = {
        shop1: [
          { img: 'cloths1.jpg', name: 'Cloth Shop A' },
          { img: 'cloths2.jpg', name: 'Cloth Shop B' }
        ],
        shop2: [
          { img: 'ele.jpg', name: 'Electric Shop A' },
          { img: 'electric1.jpg', name: 'Electric Shop B' }
        ],
        shop3: [
          { img: 'mobile1.jpg', name: 'Mobile Shop A' },
          { img: 'mobile2.jpg', name: 'Mobile Shop B' }
        ],
        shop4: [
          { img: 'agri1.jpg', name: 'Agri Culture Shop A' },
          { img: 'agri2.jpg', name: 'Agri Culture Shop B' }
        ]
      };

      // Display shop items based on the selected shop
      if (shopData[selectedValue]) {
        shopData[selectedValue].forEach(shop => {
          var shopItem = `
            <div class="shop-item">
              <img src="${shop.img}" alt="${shop.name}">
              <button onclick="visitShop('${shop.name}')">Visit</button>
            </div>
          `;
          shopItemsContainer.innerHTML += shopItem;
        });
        shopDetailsContainer.innerHTML = '<p>Select a shop to see details.</p>';
      } else {
        shopDetailsContainer.innerHTML = '<p>Please select a shop.</p>';
      }
    }

    function showStory(storyType) {
      var inputElement = document.getElementById('story-input');
      inputElement.setAttribute('data-story-type', storyType);
      inputElement.click();
    }

    function uploadStory(event) {
      var inputElement = event.target;
      var storyType = inputElement.getAttribute('data-story-type');
      var file = event.target.files[0];

      if (file && (file.type.startsWith('video') || file.type.startsWith('image'))) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var mediaUrl = e.target.result;
          var storyImage = document.getElementById(storyType + '-story');
          var storyVideo = document.getElementById(storyType + '-story-video');

          if (file.type.startsWith('video')) {
            storyVideo.src = mediaUrl;
            storyVideo.style.display = 'block';
            storyImage.style.display = 'none';
          } else {
            storyImage.src = mediaUrl;
            storyImage.style.display = 'block';
            storyVideo.style.display = 'none';
          }

          document.querySelector('.circle[onclick="showStory(\'' + storyType + '\')"]').classList.add('active');
          alert('Story uploaded successfully!');
        };
        reader.readAsDataURL(file);
      } 
      
    }

    function showFullScreen(storyType) {
      var modal = document.getElementById('story-modal');
      var modalImage = document.getElementById('modal-image');
      var modalVideo = document.getElementById('modal-video');
      var storyImage = document.getElementById(storyType + '-story');
      var storyVideo = document.getElementById(storyType + '-story-video');

      if (storyVideo.style.display === 'block') {
        modalVideo.src = storyVideo.src;
        modalVideo.style.display = 'block';
        modalImage.style.display = 'none';
      } else {
        modalImage.src = storyImage.src;
        modalImage.style.display = 'block';
        modalVideo.style.display = 'none';
      }

      modal.style.display = 'block';
    }

    function goBack() {
      var modal = document.getElementById('story-modal');
      modal.style.display = 'none';
    }
   
  </script>

</body>
</html>

