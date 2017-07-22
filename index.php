<?php
$array = scandir('post');
$files = [];
foreach ($array as $file) {
    if ($file === '.') {
        continue;
    }
    if ($file === '..') {
        continue;
    }
    $files[] = $file;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>My Awesome Blog</title>
</head>
<script>

$(function(){
	
	var $window = $(window);		//Window object
	
	var scrollTime = 1;			//Scroll time
	var scrollDistance = 170;		//Distance. Use smaller value for shorter scroll and greater value for longer scroll
		
	$window.on("mousewheel DOMMouseScroll", function(event){
		
		event.preventDefault();	
										
		var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
		var scrollTop = $window.scrollTop();
		var finalScroll = scrollTop - parseInt(delta*scrollDistance);
			
		TweenMax.to($window, scrollTime, {
			scrollTo : { y: finalScroll, autoKill:true },
				ease: Power1.easeOut,	//For more easing functions see https://api.greensock.com/js/com/greensock/easing/package-detail.html
				autoKill: true,
				overwrite: 5							
			});
					
	});
	
});

</script>
<body class="container">
<header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

  <nav>
    <h1>Veille<a target="_blank">Techno</a></h1>
    
  </nav>
  





</header>
    
   
   
    <a href="https://twitter.com/GirlyDev" class="twitter-follow-button" data-show-count="false">Follow @GirlyDev</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    <nav style="text-align:center"><a href="create.html">Post new article</a></nav>
    <h1> Last Posts: </h1>
    <?php foreach ($files as $file) { ?>
   <article class="col-sm-4 col-sm-offset-2" >
        <h2><?php echo basename($file, '.txt'); ?></h2>
        <p><?php echo file_get_contents('post/' . $file); ?></p>
        <form action="delete-post.php" method="POST">
            <input type="hidden" name="filename" value="<?php echo $file; ?>">
            <input type="submit" value="delete">
        </form>
    </article>
    <?php } ?>
    <footer>
     <a class="twitter-timeline" data-lang="fr" data-width="400" data-height="400" href="https://twitter.com/GirlyDev">Tweets by GirlyDev</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</footer>
</body>
</html>