<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Line Bot</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Line Bot</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/.jpg" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#PushMessage">PushMessage</a>
          </li>
		  <!--
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education">Education</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
          </li>
		  -->
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

	<!-- Modal -->
	<div class="modal fade" id="pushMessageModal" tabindex="-1" role="dialog" aria-labelledby="modal_pushMessage" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="pushMessageModalLabel">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body" id="modal_mainBody">
			...
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
	  </div>
	</div>
	
      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="pushMessage">
        <div class="my-auto">
          <h1 class="mb-0">Push Messahe
            <span class="text-primary">Line</span>
          </h1>
          <div class="subheading mb-5">
            <a href="mailto:name@email.com"></a>
          </div>
          <p class="lead mb-5"></p>
          
		  <div class="resume-item d-flex flex-column flex-md-row mb-3">
            <div class="resume-content">
              <h3 class="mb-0">Receiver (Line ID)</h3>
              <div class="subheading mb-3"><input class="form-control" type="text" id="receiver" name="receiver"></div>
            </div>
          </div>
		  
		  <div class="resume-item d-flex flex-column flex-md-row mb-3">
            <div class="resume-content">
              <h3 class="mb-0">Message</h3>
              <div class="subheading mb-3"><input class="form-control" type="text" id="message" name="message"></div>
            </div>
          </div>

		  <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content">
				<button class="btn btn-primary" id="btn_push">Push</button>
            </div>
          </div>
		  
	
        </div>
      </section>

	  <script type="text/javascript">
	  $("#btn_push").click(function(){
		  var send = { 
						r:$("#receiver").val(),
						m:$("#message").val()
					}
		  $.post( "pushMessage.php",send,
		  function( data ) {
			  $("#modal_mainBody").html(data);
			   $('#pushMessageModal').modal('show');
			});
		 
	  })
	  
	  </script>
	  


   

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
