<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
			body{
                 background-color: #fff;
                 color: #636b6f;
                 font-family: Verdana;
                 font-weight: 100;
                 height: 100vh;
                 margin: 0;
				 padding: 10px 20px;
             }
			 
			 button{
                 background-color: #fff;
                 color: #636b6f;
                 font-family: Verdana;
				 border: 2px solid #ddd;
                 font-weight: 100;
				 padding: 1% 2%;
			 }

			.modal-hidden {
			  display: none;
			}

			.modal {
			  color: white;
			  padding: 20px 30px;
			  width: 50%;
			  min-height: 30px;
			  margin: 5% auto 0;
			  background: #fff;
			  background-color: green;
			}

			.modal-button {
			  display: inline-block;
			  width: 16px;
			  height: 16px;
			  margin-left: 10px;
			  margin-right: 10px;
			  cursor: pointer;
			  color: #003300;
			}
        </style>
    </head>
    <body>
		<h3> Task 1: Get country name by IP </h3>
        <div>
            <p> Country: {{ $country }} </p>
			<p> Important note: <br> Localhost returns ::1 as IP address, so I hardcoded a dummy IP instead. <br> 
			See LocationCommunicationController, line 23 for the correct method to get the IP 
			and to test the logic by yourself. </p>
        </div>
		<hr>
		<h3> Task 2: Abstract modal dialogs in ES6 </h3>
		<button id="clickme">Click me to generate another modal with an unique id</button>
		<script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
		<script>
		var modal1 = new Modal( document.body, 'Default modal (instantiated on load)', [ 'Close' ], 'default' );

		
		const buttons = [ 'Yes', 'No' ];
		document.getElementById( 'clickme' ).addEventListener( 'click', function() {
			var modal2 = new Modal( document.body, 'Do you agree?', buttons, 'dialog' );
			this.disabled = true;
			this.innerHTML = 'This button is disabled. You already used this id once.';
		});
		
		</script>
    </body>
</html>
