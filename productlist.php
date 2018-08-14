<div class="container">
	<?php echo !isset($_SESSION["user"]) ? '<div class="account"><a href="account.php">Log in</a><span>|</span><a href="registration.php">Register</a></div>' : ''; ?>
	
	<div class="minimun-order">Minimum order is 25 Item or 850USD</div>
	
	<div class="searching">
			<div class="product-list-control">
				<div class="filter-search">
					<label for="" class="is-required">Search</label>
					<input type="search" id="txt-filter-search" title="Search" onchange="filterTextChanged();" oninput="filterTextChanged();" onkeyup="filterTextChanged();" />
				</div>
				<?php echo isset($_SESSION["user"]) ? '<div class="btn-add-to-card">ADD SELECTED ITEMS TO CART</div>' : ''; ?>
			</div>
			<div id="search-results"></div>
	</div>
	
	<div class="tbl-product-list">
		<div class="thead">
			<div class="trow">
				<?php echo $new_release_page == 1 ? '<div class="tcol preleasedate">DATE</div>' : ''; ?>
				<div class="tcol psku">SKU</div>
				<div class="tcol pplatform">PLATFORM</div>
				<div class="tcol ppublisher">PUBLISHER</div>
				<div class="tcol pname">NAME</div>
				<div class="tcol pquantity">QUANTITY</div>
				<div class="tcol pprice">PRICE</div>
				<!--<div class="tcol padd-to-cart"></div>-->
				<!--<div class="tcol pcbox"><input type="checkbox" id="cbox-select-all-products" title="select all"></div>-->
				<div class="tcol pcbox">BUY</div>
			</div>
		</div>
		<div class="tbody">
			<?php
				function utf8ize($d) {
					if (is_array($d)) {
						foreach ($d as $k => $v) {
							$d[$k] = utf8ize($v);
						}
					} else if (is_string ($d)) {
						return utf8_encode($d);
					}
					return $d;
				}
				
				require_once ('controllers/connection.php');
				
				$conn = new connection();
				$conn->connect();
				
				$query = "select
					pro.product_id,
					pro.sku,
					pro.price,
					pro.newrelease,
					pro.releasedate,
					pro.accessory,
					CONVERT(pro.name using utf8) as name,
					pla.platform_id,
					pla.name as platform,
					pub.name as publisher,
					pla.url
					from products as pro
					left join platforms as pla on pro.platform_id = pla.platform_id
					left join publishers as pub on pro.publisher_id = pub.publisher_id
					where 1 = 1";
					
				if (isset($_GET["pl"])){
					if ($_GET["pl"] != ""){
						$query = $query . " and (pro.platform_id = '" . $_GET["pl"] . "')";
					}
				}
				
				if ($new_release_page == 1){
					$query = $query . " and (pro.newrelease = 1)";
				}
				
				if ($isaccessory == 1){
					$query = $query . " and (pro.accessory = 1)";
				}
				
				$query = $query . " order by platform_id asc, name asc";
				
				$result = $conn->command->query($query);
				
				if ($result){
					$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
					
					$rows = utf8ize($rows);
					
					if (count($rows) > 0){
						for ($i = 0; $i < count($rows); $i++){
							$platform_href = isset($_GET["pl"]) && $_GET["pl"] != "" ? '#' : 'products.php?pl=' . $rows[$i]{"platform_id"};
							echo '<div class="trow">';
							echo    $rows[$i]{"newrelease"} == 1 ? '<div class="ribbon"><span>new</span></div>' : '';
							echo    $new_release_page == 1 ? '<div class="tcol preleasedate">' . $rows[$i]{"releasedate"} . '</div>' : '';
							echo    '<div class="tcol psku">' . $rows[$i]{"sku"} . '</div>';
							echo    '<div class="tcol pplatform"><a href="'.$platform_href.'" class="p-platform">' . $rows[$i]{"platform"} . '</a></div>';
							echo    '<div class="tcol ppublisher">' . $rows[$i]{"publisher"} . '</div>';
							echo    '<div class="tcol pname">';
							echo       '<a href="#" class="p-name">' . $rows[$i]{"name"} . '</a>';
							echo    '</div>';
							echo    '<div class="tcol pquantity">';
							echo       '<span class="qty-minus">-</span>';
							echo       '<input type="text" value="0" id="txt-qty" title="Quantity" onblur="onControlLeave(this);">';
							echo       '<span class="qty-plus">+</span>';
							echo    '</div>';
							echo    '<div class="tcol pprice">';
							echo     isset($_SESSION["user"]) ? '$ ' . $rows[$i]{"price"} : '<div class="btn-click-for-price">CLICK FOR PRICE</div>';
							echo    '</div>';
							//echo '<div class="tcol padd-to-cart"><div class="btn-single-add-to-card">CLICK FOR PRICE</div></div>';
							echo    '<div class="tcol pcbox"><input type="checkbox" id="cbox-select" title="Select to buy"></div>';
							echo '</div>';
						}
					}
				}
			?>
		
		</div>
		<div class="loading">
			<i class="fas fa-spin fa-spinner"></i>
			<h4>Loading products...</h4>
		</div>
	</div>
</div>