<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Line Bot</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <!--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <!--<link href="css/resume.min.css" rel="stylesheet">-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body id="page-top">

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
			<!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>-->
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
			   $("#pushMessageModal").modal('show');
			   $("#message").val("");
			});
		 
	  })
	  
	  </script>
	  


   

    </div>


  </body>

</html>
