<?php


  ###############################################################
  #              Security and Navbar Configuration              #
  ###############################################################
  $MODULE_DEF = array('name'       => 'Help',
                      'version'    => 1.0,
                      'display'    => 'help',
                      'tab'        => 'user',
                      'position'   => 4,
                      'student'    => true,
                      'instructor' => true,
                      'guest'      => true,
                      'access'     => array());
  ###############################################################

  ################################################################
  #                  Commented on 29DEC18 by                     #
  #                       Harold Mantilla                        #
  ################################################################

  ################################################################
  #                  page made for feedback, problems, etc       #
  #                       emails me with information             #
  #  When I was admin, they could simply email me directly but   #
  # this could be useful if someone else is admin that is harder #
  # to contact.                                                  #
  ################################################################

  # Load in Configuration Parameters
  require_once("../etc/config.inc.php");

  # Load in template, if not already loaded
  require_once(LIBRARY_PATH.'template.php');

  # Load in The NavBar
  # Note: You too will have automated NavBar generation
  #       support in your future templates...
  require_once(WEB_PATH.'navbar.php');

?>

<?php

if(isset($_POST['fullname']) &&
isset($_POST['email']) &&
isset($_POST['message'])){

   $to = "m194020@usna.edu";
   $subject = "eChits Contact Email";

   $headers = "From: eChits@noreply.edu \r\n";

  $txt = "From: {$_POST["fullname"]}
  Email: {$_POST["email"]}
  Message: {$_POST["message"]}";

 $_POST['sent'] = mail($to,$subject,$txt,$headers);

}

?>
<?php
?>

<div class = "container">
<div class = "row">
<div class = "col-md-2">

</div>
<div class = "col-md-8">


  <!-- Contact -->
  <section id="contact">
    <div class = "well">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Contact Website Administrator</h2>
          <h6 class="section-subheading text-muted">Report bugs/feedback to Harold Mantilla</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" method = "POST" name="sentMessage" novalidate>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input required="required" class="form-control" id="fullname" name="fullname" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input required="required" class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea required="required" class="form-control" id="message" name = "message" placeholder="Please explain your problem in depth so we can better address it. *" required data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>

                <button id="sendMessageButton" class="btn btn-default" type="submit">Submit</button>
                <?php
                if(isset($_POST['sent']) && $_POST['sent']){
                  echo " <br><div class = \"container\">
                  <div class = \"row\">
                  ";
                  echo "<br><div class='alert alert-success' data-dismiss='alert' aria-label='close'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a> <strong>Sent!</strong></div> ";
                  echo "</div></div>";
                }
                ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>




<br>

</div>
<div class = "col-md-2">

</div>

</div>
</div>

<script>
function submit(){
   document.getElementById("contactForm").submit();
}
</script>

<!-- <script>
function sanitize(){                          //SANITIZE URL INPUT, IF QUERY DISPLAYED IN URL, GET RID OF IT
  if(window.location.href.indexOf('?') != -1){  //IS QUERY IN URL?
    var myarr = document.location.href.split("?");//EXPLODE  URL BY "?"
    document.location.href = myarr[0];            //SET URL TO URL BEFORE QUERY
  }
}

window.onload = sanitize;
</script> -->
