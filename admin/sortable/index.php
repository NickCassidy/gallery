<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>***</title>
  	<link rel="stylesheet" href="css/base.css">
  	<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:700">
  	<script src="js/html5sortable.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>.btn {float:left;} </style>
</head>
<body>

  		<div class="p3 clearfix bg-yellow maroon">
			<div class="col col-12 mb1">
					<h1 class="h1 mt1">Sort photo order</h1>

<?php
// retrieve the name of the folder from the saved session
echo "<p>You are sorting file order for the <strong>" . $_SESSION['nameOfFolder'] . "</strong> gallery</p>";
?>

					<button class="ml4 js-serialize-button button navy bg-white">Submit</button>
					
					<a href="index.php<?php echo "?gallery=" . $_SESSION['nameOfFolder'];?>"><button class="ml4 js-serialize-button button navy bg-white">Reset</button></a></div>

					<a href="/web/admin/dropzone/indexDropzonePage.php<?php echo "?gallery=" . $_SESSION['nameOfFolder'];?>"><button class="ml4 js-serialize-button button navy bg-white">Add another photo</button></a>

</div>
						<div class="col col-6">

							<h2 class="h2 mt1">Put the photos in order</h2>
					
								<!-- container for selected photos -->
								<ul class="p3 border maroon border-maroon js-sortable-copy-target sortable list flex flex-column list-reset"></ul>
						</div>
				
						<div class="col col-6">
							<h2 class="h2 mt1">All available photos</h2>

								<ul class="ml4 js-sortable-copy sortable list flex flex-column list-reset"><?php require_once "generateItemList.php"; ?> </ul>

	<script type="text/javascript">

				sortable('.js-sortable-copy-target', 
		{
				forcePlaceholderSize: true,
		
				itemSerializer: (item, container) => {
                item.parent = 'parent'
                item.node = 'item #'
                //remove list styling from html5sortable output          
 				item.html = item.html.replace('<li class="p1 mb1 yellow bg-maroon" style="position: relative; z-index: 10;" draggable="true" role="option" aria-grabbed="false" aria-copied="true">','')
 				item.html = item.html.replace('</li>','')
                return item
              										},
              	containerSerializer: (container) => {
                container.node = 'container'
                return container
              										} 
		})
            document.querySelector('.js-serialize-button').addEventListener('click', () => {
              let serialized = sortable('.js-sortable-copy-target', 'serialize')
            document.querySelector('.serialized-content').innerHTML = JSON.stringify(serialized, null, ' ')

			// window.alert(document.querySelector('.serialized-content').innerHTML)

var jsonString = JSON.stringify(serialized, null, ' ')

$.ajax
	({    
    type: 'POST',  
    url: 'postSortable.php',    
	data: jsonString,
	dataType: 'text',
    contentType:'application/json',

    success: function(data)
    		{
            var win = window.open();
            win.document.write(data);
        	},        
    error: function(data) 
    		{ 
        	console.log(data);
    		}
	});    
});

	</script>
	</div>
	</div>
		 <div class="p2 bg-navy border-top yellow border-yellow">
        		<code>
         			<pre class="serialized-content"></pre>
        		</code>
      	</div>


	<script>
		sortable('.js-sortable-copy', {
		  	forcePlaceholderSize: true,
		  	copy: true,
		  	acceptFrom: false,
		  	placeholderClass: 'mb1 border border-maroon'
		});
		sortable('.js-sortable-copy-target', {
			forcePlaceholderSize: true,
			acceptFrom: false,
			acceptFrom: '.js-sortable-copy,.js-sortable-copy-target',
			placeholderClass: 'mb1 border border-maroon'
	  });
	</script>
</body>
