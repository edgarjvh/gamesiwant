<div class="container">
	<div class="account">
		<a href="account.php">Log in</a>
		<span>|</span>
		<a href="registration.php">Register</a>
	</div>
	
	<div class="minimun-order">Minimum order is 25 Item or 850USD</div>
	
	<div class="search-filter">
		<input type="text" id="txt-search-filter" title="Search" placeholder="search" onchange="filterTextChanged();" oninput="filterTextChanged();" onkeyup="filterTextChanged();">
		<div id="search-results"></div>
	</div>
	
	<div class="tbl-brand-list">
		
		<div class="loading">
			<i class="fas fa-spin fa-spinner"></i>
			<h4>Loading Brands...</h4>
		</div>
	</div>
</div>