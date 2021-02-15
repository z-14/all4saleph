<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
$search = "%".$_GET['search']."%";
$sortBy = $_GET["sortBy"];
if (!empty($search) && !empty($sortBy)) {
	switch ($sortBy) {
	case 'All':
	$sql="SELECT * FROM `product`  where u_id = '$u_id' AND product_name != ''  AND product_name LIKE '$search' ";
	$result = $conn->query($sql);
	break;

	case 'Approved':
	$sql="SELECT * FROM `product`  where u_id = '$u_id' AND product_name != '' And post='approved' AND product_name LIKE '$search'  ";
	$result = $conn->query($sql);
	break;

	case 'Pending':
	$sql="SELECT * FROM `product`  where u_id = '$u_id' AND post='' AND product_name LIKE '$search'  ";
	$result = $conn->query($sql);
	break;

	case 'Declined':
	$sql="SELECT * FROM `product`  where u_id = '$u_id' AND product_name != '' And post='declined' AND product_name LIKE '$search' ";
	$result = $conn->query($sql);
	break;

	default:
	$sql="SELECT * FROM `product`  where u_id = '$u_id' AND product_name != '' AND product_name LIKE '$search'  ";
	$result = $conn->query($sql);
	break;
}
} else {
	$sql="SELECT * FROM `product`  where u_id = '$u_id' AND product_name != '' AND product_name LIKE '$search'  ";
	$result = $conn->query($sql);
}
?>

<div id="grid" class="c_product_grid_details">
	<div id="container-fluid"> 
		<?
		include("sql.php");
		if ($result->num_rows > 0) { ?>
			<div class="clearfix visible-sm ">
				<div class="row"><?
				while($row = $result->fetch_assoc()) 
				{
					$product_id = $row["product_id"];
					$productName = $row["product_name"];
					$productDescription = $row["product_desc"];
					$product_price = $row["product_price"];
					$product_cat = $row["product_cat"];
					$product_qty = $row["product_qty"];
					$u_id = $row["u_id"];
					$u_u = $row["u_u"];
					$count=1;
					image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u,$product_qty,$product_cat);
				}?>
			</div>
		</div>
		<?
	} else {
		echo "No product ".$categories_id;
	}?>
</div>
</div>

<?
function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$product_qty,$product_cat) {
	include("sql.php");


	$sql="SELECT * FROM product_images where product_id = '$product_id'"; 
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{


			if (empty($row['file_name']) ) 
			{
				$img = "blank.jpg";
			}else{
				$img =  "photos/".$row['file_name'];
			}

			$r = substr($productDescription, 0, 20);
			if (strlen($r) > 10)
			{
				$desco = $r."...";
			}
			else
			{
				$desco = $r;
			}


			?>


			<div class="col-12 col-lg-3 col-sm-6">
				<figure class="H-_a H-d" style="margin-bottom: 0px">

					<div class="card1 card__one1" style="height: 250px">




						<div class="H-e">
							<div class="H-p">



								<a id="<?php echo $row['product_id']; ?>">
									<img class="img-fluid" onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>', true)"alt="" src="<?php echo $img; ?>"> 



								</div>
							</div>

							<div class="row">
								<div class="col-12" style="line-height: 1.3rem;">
									<span style="color: #3e3e3e; font-size: 1.2rem;font-weight: 500"><?echo $productName;?></span>
								</div> 
							</div>


							<div class="row">
								<div class="col-12" style="line-height: 1rem;">
									<span style="color:#a6a6a6;font-size: .9rem;"><?echo "₱ ". $product_price;?></span>
								</div> 
							</div>
							<div class="row">
								<div class="col-12" style="line-height: 1rem;">
									<span style="color:#a6a6a6;font-size: .9rem;"><?  echo "Date Posted: ".date("M j, Y",$row['date']); ?></span>
								</div> 
							</div>


<div>
						
						</div>

						</div>
						
					</figure>

				</div>




				<?
			}}


		}

		?>

		<script>
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		</script>


		<style>
		.like-content {
			display: inline-block;
			width: 100%;
			font-size: 18px;
		}
		.like-content span {
			color: #9d9da4;
			font-family: monospace;
		}
		.like-content .btn-secondary {
			display: block;
			text-align: left;
			background: #ed2553;
			border-radius: 3px;
			box-shadow: 0 10px 20px -8px rgb(240, 75, 113);
			font-size: 12px;
			cursor: pointer;
			border: none;
			outline: none;
			color: #ffffff;
			text-decoration: none;
			-webkit-transition: 0.3s ease;
			transition: 0.3s ease;
		}
		.like-content .btn-secondary:hover {
			transform: translateY(-3px);
			margin-bottom: 5px;
		}
		.like-content .btn-secondary .fa {
			margin-right: 5px;
		}
		.animate-like {
			animation-name: likeAnimation;
			animation-iteration-count: 1;
			animation-fill-mode: forwards;
			animation-duration: 0.65s;
		}
		@keyframes likeAnimation {
			0%   { transform: scale(30); }
			100% { transform: scale(1); }
		}


		#sidebar-wrapper {

			-webkit-transition: margin .25s ease-out;
			-moz-transition: margin .25s ease-out;
			-o-transition: margin .25s ease-out;
			transition: margin .25s ease-out;
		}

		#sidebar-wrapper .sidebar-heading {
			padding: 0.875rem 1.25rem;
			font-size: 1.2rem;
		}


		#wrapper.toggled #sidebar-wrapper {
			margin-left: 0;
		}

		@media (min-width: 100%) {
			#sidebar-wrapper {
				margin-left: 0;
			}

			#page-content-wrapper {
				min-width: 0;
				width: 100%;
			}

			#wrapper.toggled #sidebar-wrapper {
				margin-left: -15rem;
			}
		}

	</style>
	<style>

	.checked {
		color: orange;
	}
	@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

	fieldset, label { margin: 0; padding: 0; }



	/****** Style Star Rating Widget *****/
	.selectpicker
	{
		border: white;
		text-decoration-style: none;
	}


	/*****/
	.rating { 
		border: none;
		float: left;
	}

	.rating > input { display: none; } 
	.rating > label:before { 
		margin: 5px;
		font-size: 1.25em;
		font-family: FontAwesome;
		display: inline-block;
		content: "\f005";
	}

	.rating > .half:before { 
		content: "\f089";
		position: absolute;
	}

	.rating > label { 
		color: #ddd; 
		float: right; 
	}


	/***** CSS Magic to Highlight Stars on Hover *****/

	.rating > input:checked ~ label, /* show gold star when clicked */
	.rating:not(:checked) > label:hover, /* hover current star */
	.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

	.rating > input:checked + label:hover, /* hover current star when changing rating */
	.rating > input:checked ~ label:hover,
	.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
	.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
</style>


<style>
.button {
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	-webkit-transition-duration: 0.4s; /* Safari */
	transition-duration: 0.4s;
	cursor: pointer;
}
.button4 {
	background-color: white;
	color: black;
	border: 2px solid #e7e7e7;
}

.H-z {
	display: -ms-flexbox;
	display: flex;
}


.button4:hover {background-color: #e7e7e7;}
.card1 {
	position: relative;
	flex: 1 1 100%;
	padding: 5px;
	background: white;
	width: 110%;    margin: 2px 0;


}
.H-e img {
	object-fit: cover;
	height: 160px;
	width: 100%;
	border-radius: 6px 6px 0 0;
	margin: 2px 0;
}

.ab-k {
	width: 32px;
	height: 32px;
}
.ab-b {
	border-radius: 50%;
}
}

.H-d .H-e img {
	border-radius: 0;
	.ab-_a, .ab-b {
		text-align: center;
	}
	.H-A {
		color: #262629;
		font-weight: 500;
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow-x: hidden;
		margin-left: 5px;
	}

	.card__one1 {
		transition: transform .5s;
		width: 110%;

	}
	.card__one1::after {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		transition: opacity 2s cubic-bezier(0.165, 0.84, 0.44, 1);
		box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.5);
		content: '';
		opacity: 0;
		z-index: -1;
	}
	.card__one1:hover, .card__one1:focus {
		transform: scale3d(1.006, 1.006, 1);
	}
	.card__one1:hover::after, .card__one1:focus::after {
		opacity: 1;
	}
	.card_one1 >.card__one1 >img
	{
		height: 100%;
		width :100%;
	}

</style>