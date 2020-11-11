<?php
//index.php

$error = '';
$name = '';
$email = '';
$phone = '';
$message = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    } else {
        $name = clean_text($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if (empty($_POST["email"])) {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    } else {
        $email = clean_text($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
    if (empty($_POST["phone"])) {
        $error .= '<p><label class="text-danger">Phone number is required</label></p>';
    } else {
        $phone = clean_text($_POST["phone"]);
    }
    if (empty($_POST["message"])) {
        $error .= '<p><label class="text-danger">Message is required</label></p>';
    } else {
        $message = clean_text($_POST["message"]);
    }
    if ($error == '') {
        require 'class/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages						//Sets Mailer to send message using SMTP
        $mail->Host = '';        //Sets the SMTP hosts of your Email hosting, eg: mail.xxxxxx.com
        $mail->Port = 465;                                //Sets the default SMTP server port
        $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = '';                    //Sets SMTP username eg: info@zeroappz.com
        $mail->Password = '';                    //Sets SMTP password eg: xxxxxx
        $mail->SMTPSecure = 'ssl';                            //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = $_POST["email"];                    //Sets the From email address for the message
        $mail->FromName = $_POST["name"];                //Sets the From name of the message
        $mail->AddAddress('YOUR_EMAIL', 'YOUR_NAME');        //Adds a "To" address
        $mail->AddCC($_POST["email"], $_POST["name"]);    //Adds a "Cc" address
        $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);                            //Sets message type to HTML				
        $mail->Subject = "YOUR_SUBJECT";                //Sets the Subject of the message
        $mail->Body = $_POST["message"];                //An HTML or plain text message body
        if ($mail->Send())                                //Send an Email. Return true on success or false on error
        {
            $error = '<label class="text-success">Thank you for contacting us</label>';
        } else {
            $error = '<label class="text-danger">There is an Error</label>';
        }
        $name = '';
        $email = '';
        $phone = '';
        $message = '';
    }
}

?>
<?php
include "header.php";
?>


<!-------------------------------------------------------------------------------------------------------->
<!-----------------------------------------********Header - END*******------------------------------------------------------>
<!-------------------------------------------------------------------------------------------------------->

<style>
    .contact-info-block .inner {
        position: relative;
        padding: 20px 20px;
        padding-left: 80px;
        transition: all 300ms ease;
        border-bottom: 2px solid transparent;
    }

    .contact-info-block .inner:hover {
        background: #ffffff;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.10);
        transform: translateY(-20px);
        -webkit-transform: translateY(-20px);
        border-bottom: 2px solid #1370b5;
    }

    .contact-info-block .icon {
        position: absolute;
        left: 20px;
        top: 25px;
        font-size: 40px;
        line-height: 1em;
        color: #1370b5;
        display: inline-block;
        margin-bottom: 10px;
    }
</style>


<!-- Featured Title -->
<div id="featured-title" class="featured-title clearfix">
    <div id="featured-title-inner" class="container clearfix">
        <div class="featured-title-inner-wrap">
            <div id="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumb-trail">
                        <a href="index.php" class="trail-begin">Home</a>
                        <span class="sep">|</span>
                        <span class="trail-end">Contact</span>
                    </div>
                </div>
            </div>
            <div class="featured-title-heading-wrap">
                <h1 class="feautured-title-heading">
                    Contact Us
                </h1>
            </div>
        </div>
        <!-- /.featured-title-inner-wrap -->
    </div>
    <!-- /#featured-title-inner -->
</div>
<!-- End Featured Title -->

<!-- Main Content -->
<div id="main-content" class="site-main clearfix">
    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <!-- ICONBOX -->
                    <div class="row-iconbox">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="60" data-smobile="60"></div>
                                    <div class="themesflat-headings style-1 text-center clearfix">
                                        <h2 class="heading">CONTACT US</h2>
                                        <div class="sep has-icon width-125 clearfix">
                                            <div class="sep-icon">
                                                <span class="sep-icon-before sep-center sep-solid"></span>
                                                <span class="icon-wrap"><i class="Olivine-icon-build"></i></span>
                                                <span class="sep-icon-after sep-center sep-solid"></span>
                                            </div>
                                        </div>
                                        <p class="sub-heading font-weight-400 max-width-770 line-height-26 margin-top-14">
                                            Are you interested in South Asian Minerals to get the product which your are looking for? For more information on our services please contact us.</p>
                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="45" data-mobile="35" data-smobile="35"></div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->


                            <div class="row gutter-16">
                                <div class="col-md-4">
                                    <div class="themesflat-icon-box icon-top align-center  accent-color style-3 bg-light-snow clearfix">
                                        <div class="icon-wrap">
                                            <i class="icon-phone"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#">+91 94452 03057 | 96003 49333</a></h5>
                                            <p class="sub-heading">Local Support 12/7</p>
                                            <span class="class more-link"><a href="tel:94452 03057 | 96003 49333">Call us now</a></span>
                                        </div>
                                    </div>
                                    <!-- /.themesflat-icon-box -->
                                </div>
                                <!-- /.col -->

                                <div class="col-md-4">
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                    <div class="themesflat-icon-box icon-top align-center accent-color style-3 bg-light-snow clearfix">

                                        <div class="icon-wrap">
                                            <i class="icon-map"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="#"># 154/C-2, Barathiyar Street,</a></h5>
                                            <p class="sub-heading">Kalarampatti Main Road, Salem -636015.</p>
                                            <span class="class more-link">Tamil Nadu.</span>
                                        </div>

                                    </div>
                                    <!-- /.themesflat-icon-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                    <div class="themesflat-icon-box icon-top align-center accent-color style-3 bg-light-snow clearfix" style=" box-shadow: 0 0 30px rgba(0, 0, 0, 0.10);">
                                        <div class="icon-wrap">
                                            <i class="icon-envelope"></i>
                                        </div>
                                        <div class="text-wrap">
                                            <h5 class="heading"><a href="mailto:south.asian.minerals@hotmail.com">south.asian.minerals@hotmail.com</a></h5>
                                            <p class="sub-heading">Support 24/7 - Online 24 hours</p>
                                            <span class="class more-link"><a href="mailto:south.asian.minerals@hotmail.com">Mail us now</a></span>
                                        </div>
                                    </div>
                                    <!-- /.themesflat-icon-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="58" data-mobile="35" data-smobile="35"></div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- END ICONBOX -->

                    <!-- CONTACT -->
                    <div class="row-contact">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="themesflat-contact-form style-2 w100 clearfix">
                                        <?php echo $error; ?>
                                        <!--<form method="post" class="contact-form wpcf7-form">
                                            <span class="wpcf7-form-control-wrap your-name">
                                                <input type="text" tabindex="1" id="name" name="name" value="" class="wpcf7-form-control" placeholder="Name*" required>
                                            </span>
                                            <span class="wpcf7-form-control-wrap your-email">
                                                <input type="email" tabindex="3" id="email" name="email" value="" class="wpcf7-form-control" placeholder="Your Email*" required>
                                            </span>
                                            <span class="wpcf7-form-control-wrap your-phone">
                                                <input type="text" tabindex="2" id="phone" name="phone" value="" class="wpcf7-form-control" placeholder="Phone">
                                            </span>
                                            <span class="wpcf7-form-control-wrap your-message">
                                                <textarea name="textarea" tabindex="5" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Message*" required></textarea>
                                            </span>
                                            <span class="wrap-submit">
                                                <input type="submit" value="SEND US" class="submit wpcf7-form-control wpcf7-submit" id="submit" name="submit">
                                            </span>
                                        </form>-->
                                        <form method="post">
                                            <div class="form-group">
                                                <label>Enter Name</label>
                                                <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Phone Number</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" value="<?php echo $phone; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Message</label>
                                                <textarea name="message" cols="40" rows="10" class="form-control wpcf7-textarea" placeholder="Enter your message here"><?php echo $message; ?></textarea>
                                            </div>
                                            <div class="form-group" align="center">
                                                <input class="submit wpcf7-form-control wpcf7-submit" type="submit" name="submit" value="SEND US" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->



                                <div class="col-md-8">
                                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                    <!--  <div class="themesflat-map style-2"></div>-->
                                    <div class="map" style="width:100%;height:100%;">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3907.717683088547!2d78.15922571429333!3d11.643455445775869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3babee2efd9a047b%3A0x383837b3c57f8fda!2sKallarampatty%20Main%20Rd%2C%20Salem%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1597841378261!5m2!1sen!2sin" width="100%" height="395" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="81" data-mobile="60" data-smobile="40"></div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- END CONTACT -->
                </div>
                <!-- /.page-content -->
            </div>
            <!-- /#inner-content -->
        </div>
        <!-- /#site-content -->
    </div>
    <!-- /#content-wrap -->
</div>
<!-- /#main-content -->

<!----------------------------------------------------------------------------------------------->
<!------------------------------------------FOOTER----------------------------------------------------->
<?php
include "footer.php";
?>
</body>

</html>