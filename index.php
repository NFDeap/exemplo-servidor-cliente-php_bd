<html>

<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="client.js"></script> -->

	<script type="text/javascript">
		$(function() {
			getNotifications();
		});

		function getNotifications(timestamp) {
			var data = [];

			if (typeof timestamp != 'undefined') {
				data.timestamp = timestamp;
			}

			$.post('server.php', data, function(res) {
				console.log(res);
				if (res.notifications.comment != null || res.notifications != []) {
					$('#response').append(res.notifications.comment + '<br>');
				}
				/* for(i in res.notifications){ */
				/* console.log(res.notifications.comment); */

				/* } */

				getNotifications(res.timestamp);

			}, 'json');

		}
	</script>

</head>

<body>
	<h3>Conteúdo</h3>
	<div id="response"></div>

	<div class="container">

		<div class="row">

			<div class="col">

				<button onclick="insert_notification();">Insert Notify</button>

			</div>

		</div>

	</div>

	<script>

		function insert_notification(timestamp) {
            author = 'teste author';
            comment = 'teste comment';     

			if (typeof timestamp != 'undefined') {
				data.timestamp = timestamp;
			}


            $.ajax({
                type: "post",
                url: "insert_notify.php",
                data: {                                
                	'author': author,
					'comment': comment,
					'timestamp': timestamp
                },                
                success: function(response) {
                    console.log(response);                    
                },
                error: function(request, status, error) {
                    console.log(error);
                }
            });

        }


	</script>

</body>

</html>