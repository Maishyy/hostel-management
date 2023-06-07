<?php
  require 'includes/config.inc.php';

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> HMS</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>
		<?php
		$id = $_GET['id'];

		// Query to retrieve the hostel details from the database
		$query = "SELECT * FROM hostels WHERE hostel_id = $id";
		$result = mysqli_query($conn, $query);
		
		if ($result && mysqli_num_rows($result) > 0) {
			$hostels = mysqli_fetch_assoc($result);
		}
		 
			$hostelId = $_GET['id'];
			$roomType='';
			$pricePerNight='';
		// Make a database query to fetch the room details
		// Make a database query to fetch the room details
	$query = "SELECT room_id, room_type, price_per_night FROM room WHERE hostel_id = '$hostelId'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		$rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}
		
		?>
		
<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="home.php">HMS <span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="services.php">Hostels</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="message_user.php">Message Received</a>
					</li>
						<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['roll']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="profile.php">My Profile</a>
							</li>
							<li>
								<a href="includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
					</ul>
				</div>
			  
			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner --> 

<section class="contact py-5">
	<div class="container">
		<h2 class="heading text-capitalize mb-sm-5 mb-4"> Application Form </h2>
			<div class="mail_grid_w3l">
				<form action="application_form.php?id=<?php echo $_GET['id']?>" method="post">
					<div class="row">
						<div class="col-md-6 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
								<input type="text" name="Name" placeholder="Name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="roll_no" placeholder="Roll Number" value="<?php echo $_SESSION['roll']?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="hostel" placeholder="Hostel" value="<?php echo $_GET['id']?>" required="" disabled="disabled">
							</div>
							<div class="contact-fields-w3ls">
								<input type="text" name="location" placeholder="Location" value="<?php echo $hostels['location']; ?>" required="" disabled="disabled">
							</div>
							
							<div class="contact-fields-w3ls">
			<select name="room_id" required>
			<option value="" selected disabled>Select Room</option>
					<?php
					foreach ($rooms as $room) {
						$roomId = $room['room_id'];
						$roomType = $room['room_type'];
						$pricePerNight = $room['price_per_night'];

						$selected = '';
						if (isset($_POST['room_id']) && $_POST['room_id'] == $roomId) {
							$selected = 'selected';
						}

						echo "<option value='$roomId' $selected>Room ID: $roomId - $roomType - KES $pricePerNight per night</option>";
					}
					?>

		</select>

        </div>
							<div class="contact-fields-w3ls">
								<input type="password" name="pwd" placeholder="Password" required="">
							</div>
						</div>
						<div class="col-md-6 contact_left_grid" data-aos="fade-left">
							<div class="contact-fields-w3ls">
								<textarea name="Message" placeholder="Message..." ></textarea>
							</div>
							<input type="submit" name="submit" value="Click to Apply">
						</div>
					</div>

				</form>
			</div>
		
	</div>
</section>

<!--footer-->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="#" target="_blank">HMS <span class="display"> BETTER LIVING</span></a>
		</div>
		<div class="footer-grid">
			
			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="home.php">Home</a>
					</li>
					
					<li>
						<a href="services.php">Hostels</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
					</li>
					<li>
						<a href="profile.php">Profile</a>
					</li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->
		
	<!-- stats -->
	<script src="web_home/js/jquery.waypoints.min.js"></script>
	<script src="web_home/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->
	
<!-- //js-scripts -->

</body>
</html>

<?php


   //Room and hostel;
   if (isset($_POST['submit'])) {
    $roll = $_SESSION['roll'];
    $password = $_POST['pwd'];
    $hostelId = $_GET['id'];
    $message = $_POST['Message'];
    $selectedRoomId = $_POST['room_id'];

    echo "Hostel ID: " . $hostelId . "<br>"; // Debugging statement

    // Fetch hostel details
    $queryHostel = "SELECT * FROM Hostels WHERE hostel_id = '$hostelId'";
    $resultHostel = mysqli_query($conn, $queryHostel);
    $rowHostel = mysqli_fetch_assoc($resultHostel);

    echo "Hostel Details: " . print_r($rowHostel, true) . "<br>"; // Debugging statement

    // Fetch selected room details
    $queryRoom = "SELECT * FROM Room WHERE room_id = '$selectedRoomId' AND Allocated > 0";
    $resultRoom = mysqli_query($conn, $queryRoom);

    if ($resultRoom && mysqli_num_rows($resultRoom) > 0) {
        $rowRoom = mysqli_fetch_assoc($resultRoom);
        $roomType = $rowRoom['room_type'];

        echo "Selected Room ID: " . $selectedRoomId . "<br>"; // Debugging statement

        // Validate the password
        $queryPassword = "SELECT Pwd FROM student WHERE Student_id = '$roll'";
        $resultPassword = mysqli_query($conn, $queryPassword);
        $rowPassword = mysqli_fetch_assoc($resultPassword);

        if ($rowPassword) {
            $storedPassword = $rowPassword['Pwd'];
            $pwdCheck = password_verify($password, $storedPassword);

            if ($pwdCheck) {
                // Insert the application record with student_id, hostel_id, room_id, and other details
                $query = "INSERT INTO Application (Student_id, Hostel_id, Room_id, Application_status, Message) VALUES ('$roll', '$hostelId', '$selectedRoomId', true, '$message')";
                $result = mysqli_query($conn, $query);

                $query4 = "UPDATE student SET Hostel_id = '$hostelId', Room_id = '$selectedRoomId' WHERE Student_id = '$roll'";
                $result4 = mysqli_query($conn, $query4);

                // Handle the result of the application submission
                if ($result && $result4) {
                    echo "<script>alert('Application sent successfully');</script>";
                    echo "<script>alert('Selected room is available. Redirecting you to payment...'); window.location.href = 'payment.php';</script>";
                } else {
                    echo "<script>alert('Error occurred while submitting the application');</script>";
                }
            } else {
                echo "<script>alert('Incorrect Password!!');</script>";
            }
        } else {
            echo "<script>alert('Invalid student ID');</script>";
        }
    } else {
        echo "<script>alert('The selected room is not available. Please choose another room.');</script>";
    }
}


?>
<?php
/*
      	    $query2 = "SELECT * FROM Hostels WHERE Hostel_name = '$hostel'";
      	    $result2 = mysqli_query($conn,$query2);
      	    $row2 = mysqli_fetch_assoc($result2);
      	    $hostel_id = $row2['Hostel_id'];
            $query3 = "INSERT INTO Application (Student_id,Hostel_id,Application_status,Message) VALUES ('$roll','$hostel_id',true,'$message')";
            $result3 = mysqli_query($conn,$query3);

            if($result3){
            	 echo "<script type='text/javascript'>alert('Application sent successfully')</script>";
            }
      }
     }

     }
     else{
     	echo "<script type='text/javascript'>alert('You have Already applied for a Room')</script>";
     }
    
     }
     else{
          echo "<script type='text/javascript'>alert('You have Already been alloted a Room')</script>";   
      }


} */