<!doctype html>
<html>
<head>
<title>PostCode Finder</title>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap-theme.min.css">

	<style>
		
		html, body {
			height:100%;
		}
		
		
		.container {
			background-image:url("background.jpg");
			width:100%;
			height:100%;
			background-size:cover;
			background-position:center;
			padding-top:150px;
		}
		
		.center {
			text-align:center;
		}
		
		.white {
			color:white;
		}
        
        .blu {
            color:#CACFD2;
            
        }
		
		p {
			padding-top:15px;
			padding-bottom:15px;
		}
		
		button {
			margin-top:20px;
			margin-bottom:20px;
	
		}
		
		.alert {
			margin-top:30px;
			display:none;
			
		}
		
        .whiteBackground {
            background-color: #B66064;
            padding: 20px;
            opacity: 0.9;
          
            
            
        }
	
	
	</style>
	
</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 center whiteBackground">

				<h1 class="center blu">PostCode Finder</h1>
				
				<p class="lead center blu">Enter any address to find a postcode</p>
				
				<form>
							
					<div class="form-group">	
				
						<input type="text" class="form-control" name="address" id="address" placeholder="Eg. 25 Mill Road, Cambridge  "/>
					</div>
					
					<button id="findMyPostcode" class="btn btn-warning btn-lg">Find my PostCode</button>
					
					
				</form>
				
					<div id="success" class="alert alert-success">Success!</div>
					
					<div id="fail" class="alert alert-danger">Could not find the post code for that address. Please, Try again.</div>
					
					<div id="fail2" class="alert alert-danger">Could not connect to server. Please, Try again.</div>
					
				</div>
				
			</div>
			
		</div>



<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>

		$("#findMyPostcode").click(function(event) {
            
        var result=0;    
            
        $(".alert").hide();    
            
        event.preventDefault();
			
			 $.ajax({
                 type: "GET",
                 url:
"https://maps.googleapis.com/maps/api/geocode/xml?address="+$('#address').val()+"&sensor=false&key=AIzaSyBaeZAdeXIFbCZp8enE7Gdz0_7ZLJ4fYQk",
                 dstaType: "xml",
                 success: processXML,
                 error: error
             });
            
            function error() {
                $("#fail2").fadeIn();
                
                
            }
            
            function processXML(xml) {
                
                $(xml).find("address_component").each(function() {
                    
                    if ($(this).find("type").text() == "postal_code") {
                        
                        $("#success").html("The postcode you need is "+$(this).find('long_name').text()).fadeIn();
                        
                        result=1;
                        
                }
            });
                
            if (result==0) {
                
                $("#fail").fadeIn();
                
            }
            
			
		 }
            
        });
    
    // AIzaSyBZFe8s1jJnkVbtZty2gR03XjhJ4vXcxCo
</script>

	</body>
</html>