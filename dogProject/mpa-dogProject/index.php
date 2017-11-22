<!--open php tag -->
<?php
    //set title
	$title = 'Dog Project';
	//include header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag-->
<main id="content">
    <!--open banner div-->
	<div id="banner">
        <!--add text to the banner-->
        <div id="banner-text">
            <!--header for the banner-->
            <h1>A house is not a home without a dog</h1>
        <!--close banner text-->
        </div>
    <!--close banner -->
    </div>
    <!--open wrapper-->
	<div class="wrapper">
        <!--open recently added div-->
		<div id="recentlyAdded">
            <!--header-->
			<h2>Recently Added</h2>
                <!--open php tag-->
				<?php
                    //require recently added page-->
					require_once("mostRecentAdverts.php");
				//close php tag
				?>
		<!--close recently added-->
		</div>
    <!--close wrapper-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
    require_once("../Includes/footer.php");
?>