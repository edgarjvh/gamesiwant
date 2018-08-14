<?php
	$uri = $_SERVER["REQUEST_URI"];
	
	$menu_home = $uri == "/" ? "active" : "";
	$menu_about = $uri == "/about.php" ? "active" : "";
	$menu_services = $uri == "/services.php" ? "active" : "";
	$menu_news = $uri == "/news.php" ? "active" : "";
	$menu_allproducts = $uri == "/allproducts.php" ? "active" : "";
	$menu_faq = $uri == "/faq.php" ? "active" : "";
?>

<header id="upper-header">
	<div class="container">
		<div>GAMES ON ALL PLATFORMS</div>
		<div class="account-section">
			<a href="registration.php">Register</a>
			<span>|</span>
			<a href="account.php">Login</a>
			<a href="https://www.facebook.com/gamesiwant/"><i class="fab fa-facebook-f"></i></a>
		</div>
	</div>
</header>

<header id="menu-header">
	
	<div class="container">
		<div class="left-menu">
			<a href="/"><img src="img/logo.png" alt=""></a>
			<ul id="main-menu">
				<li><a href="/" class="<?php echo $menu_home; ?>">HOME</a></li>
				<li><a href="about.php" class="<?php echo $menu_about; ?>">ABOUT</a></li>
				<li><a href="services.php" class="<?php echo $menu_services; ?>">OUR SERVICES</a></li>
				<li><a href="news.php" class="<?php echo $menu_news; ?>">NEWS</a></li>
				<li>
					<a href="products.php" class="<?php echo $menu_allproducts; ?>">
						ALL PRODUCTS
						<i class="fas fa-chevron-down"></i>
					</a>
					
					<div class="sub-list-container">
						<div>
							<i class="fas fa-caret-up"></i>
							
							<ul class="sub-list">
								<li><a href="products.php?pl=3">Nintendo Switch</a></li>
								<li><a href="products.php?pl=10">PlayStation 2</a></li>
								<li><a href="products.php?pl=4">PlayStation 3</a></li>
								<li><a href="products.php?pl=1">PlayStation 4</a></li>
								<li><a href="products.php?pl=8">PlayStation Vita</a></li>
								<li><a href="products.php?pl=2">Xbox One</a></li>
								<li><a href="products.php?pl=7">Xbox 360</a></li>
								<li><a href="products.php?pl=5">Wii-U</a></li>
								<li><a href="products.php?pl=13">Toys and Fun</a></li>
								<li><a href="products.php?pl=12">Sony PSP</a></li>
								<li><a href="products.php?pl=6">Nintendo Wii</a></li>
								<li><a href="products.php?pl=11">Nintendo DS</a></li>
								<li><a href="products.php?pl=9">Nintendo 3DS</a></li>
								<li><a href="products.php?pl=14">Cards</a></li>
							</ul>
						</div>
					
					</div>
				</li>
				<li><a href="faq.php" class="<?php echo $menu_faq; ?>">FAQ</a></li>
			</ul>
		</div>
		<div class="cart-info">
			<a href="cart.php">
				CART /
				<div id="my-bag">
					<div id="cart-counter">0</div>
					<div class="aza"></div>
				</div>
			</a>
		</div>
	</div>
</header>

<a href="#top" class="scrollUp">&#60</a>