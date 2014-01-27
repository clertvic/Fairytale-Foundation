<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" text="text/css" href="style.css" type="text/css">

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
                <a href="donate.php">
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
        $name = $email = $subject = $message = "";
        $nameErr = $emailErr = $subjectErr = $messageErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["name"]))
            {
                $nameErr = "Name is required.";
            }
            else
            {
                $name = test_input($_POST["name"]);

                if(!preg_match("/^[a-zA-Z ]*$/", $name))
                {
                    $nameErr = "Only letters and white space allowed.";
                }
            }
            if(empty($_POST["email"]))
            {
                $emailErr = "Email is required.";
            }
            else
            {
                $email = test_input($_POST["email"]);

                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
                {
                    $emailErr = "Invalid email format";
                }
            }
            if(empty($_POST["subject"]))
            {
                $subjectErr = "Subject is required.";
            }
            else
            {
                $subject = test_input($_POST["subject"]);
            }
            if(empty($_POST["message"]))
            {
                $messageErr = "Message is required.";
            }
            else
            {
                $message = test_input($_POST["message"]);
                $message = wordwrap($message, 70);
            }
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }
        ?>
        
        <!-- BEGIN SINGLE WORK -->

        <div class="container">
<!--
            <section class="cover work">
                <div class="slide" style="background-image: url(contents/parkey_cover.png); opacity: 1; -webkit-transition: opacity 1000ms ease-in-out; transition: opacity 1000ms ease-in-out;"></div>
            </section>
-->
			<section class="page">
			    <div class="wrapper">
			    <p>These patients deserve to smile, laugh, feel healthy and themselves, and most of all to just be a kid. Every dollar is going towards making these children smile.  I can't tell you how special these visits are, and I thank you from the bottom of my heart for helping to make it possible. It means the world to me to be able to make this a reality. All money raised is being managed by Erika Strasburg and not through the hospital or it's affiliates.
			    </p>
			        <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<label for="name">Name *</label>
						<input type="text" name="name" id="name" value="<?php echo $name ?>"><?php echo $nameErr; ?>
						<label for="email">Email *</label>
						<input type="text" name="email" id="email" value="<?php echo $email ?>"><?php echo $emailErr; ?>
						<label for="subject">Subject *</label>
						<input type="text" name="subject" id="subject" value="<?php echo $subject ?>"><?php echo $subjectErr; ?>
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
