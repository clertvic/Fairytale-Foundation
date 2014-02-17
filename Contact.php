<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-cache" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Alegreya:400italic,700italic,900italic,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" text="text/css" href="css/style.css" type="text/css">

	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/init.js?=ver1.1"></script>
    <title></title>
</head>

<body>
    <!-- BEGIN HEADER -->

    <header class="page-header">
        <nav class="page-nav">
            <div class="page-nav-logo">
                <a href="index.php">
                    <span class="page-nav-menu-icon"></span>
                </a>
            </div>

            <div class="page-nav-menu-links">
                <div class="page-nav-menu-link" data-link="mission">
                <a href="mission.php">
                    <span class="page-nav-menu-icon"></span>                
                    <span class="page-nav-menu-caption">Mission</span>
                </a>
                </div>
                <div class="page-nav-menu-link" data-link="journey">
                <a href="journey.php">
                    <span class="page-nav-menu-icon"></span>                
                    <span class="page-nav-menu-caption">Journey</span>
                </a>
                </div>
                <div class="page-nav-menu-link" data-link="donate">
                <a href="donate.php">
                    <span class="page-nav-menu-icon"></span>                
                    <span class="page-nav-menu-caption">Donate</span>
                </a>
                </div>
                <div class="page-nav-menu-link active" data-link="contact">
                <a href="contact.php">
                    <span class="page-nav-menu-icon"></span>                
                    <span class="page-nav-menu-caption">Contact</span>
                </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- END HEADER -->
    
    <?php
        // Define variables and set to empty values
		empty_variables();
        
        $fromEmail = "admin@thefairytalefoundation.org";
        $toEmail = "contact@thefairytalefoundation.org";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(empty($_POST["name"])){
                $visitorNameErr = "Name is required.";
            }
            else {
                $visitorName = test_input($_POST["name"]);

                if(!preg_match("/^[a-zA-Z ]*$/", $name)){
                    $visitorNameErr = "Only letters and white space allowed.";
                }
            }
            
            if(empty($_POST["email"])){
                $visitorEmailErr = "Email is required.";
            }
            else{
                $visitorEmail = test_input($_POST["email"]);

                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $visitorEmail)){
                    $visitorEmailErr = "Invalid email format";
                }
            }
            if(empty($_POST["message"])){
                $messageErr = "Message is required.";
            }
            else{
                $message = test_input($_POST["message"]);
                $message = wordwrap($message, 70);
            }
            
            if(empty($visitorNameErr) && empty($visitorEmailErr) && empty($messageErr)){
            	
            	$header = "From: " . $visitorName . "<" . $fromEmail . ">" . PHP_EOL;
				$header .= "Reply-To: " . $visitorEmail . PHP_EOL;
				$emailMessage = "Name: " . $visitorName . PHP_EOL;
				$emailMessage .= "Email: " . $visitorEmail . PHP_EOL;
				$emailMessage .= "Message: " . PHP_EOL . PHP_EOL . $message;
				
	            $success = mail($toEmail, "[Contact Form] " . $visitorName, $emailMessage, $header, "-f$fromEmail");
            }
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }
        
        function empty_variables(){
	        $visitorName = $visitorEmail = $message = $thankyou = "";
			$visitorNameErr = $visitorEmailErr = $messageErr = "";
        }
        ?>
        
        
        <!-- BEGIN SINGLE WORK -->

        <div class="container">
            <section class="cover work">
                <div class="slide contact"></div>
            </section>
			<section class="page">
			    <div class="wrapper">
			    <h1>Contact</h1>
			    <p class="center">Questions? Comments? Request a princess visit? Fill out the form below or <a href="mailto:<?php echo $toEmail ?>">write me an email.</a></p>
			    <?php
			    if($success){ 
				    echo "<p class='center'>Thank you for your message.</p>";
				    
				    $visitorName = $visitorEmail = $message = "";
					$visitorNameErr = $visitorEmailErr = $messageErr = "";
			    }
			    ?>
			        <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<label for="name">Name *</label>
						<input type="text" name="name" id="name" value="<?php echo $visitorName ?>"><?php echo $visitorNameErr; ?>
						<label for="email">Email *</label>
						<input type="text" name="email" id="email" value="<?php echo $visitorEmail ?>"><?php echo $visitorEmailErr; ?>
						<label for="message">Message *</label> 
			            <textarea name="message" id="message" rows="10"><?php echo $message ?></textarea><?php echo $messageErr; ?>
			            <input type="submit" name="submit" value="Submit">
			        </form>
			    </div>
			</section>
        </div>
        
        <!-- END SINGLE WORK -->
</body>
</html>
