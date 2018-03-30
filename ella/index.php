<!DOCTYPE html>
<html lang="en"><!-- Ella page -->
    <head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
        <?php include "../googleJs.php"; ?>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-17355854-1');
        </script>
        <meta charset="utf-8">
		<meta name="viewport" id="jb-viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1, user-scalable=0" />

		<title>Simon Turtle - Celebrity Photographer | Ella</title>
		
        <meta name="description" content="Photography by London based celebrity photographer, Simon Turtle">
        <meta name="author" content="Simon Turtle">
        <meta property="og:site_name" content="Simon Turtle"/>
        <meta property="og:title" content="Celebrity Photographer London - Simon Turtle"/>
        <meta property="og:url" content="https://www.simonturtle.com/"/>
        <meta property="og:type" content="website"/>
        <meta property="og:description" content="Simon Turtle is a London based photographer specialising in theatre advertising photographs, photographs of celebrities, musicians, actors, comedians, editorial Features and TV promotion"/>
        <meta property="og:image" content="https://www.simonturtle.com/images/jsonldImage/lionking.jpg"/>
        <meta property="og:image:width" content="372"/>
        <meta property="og:image:height" content="537"/>
        <link rel="manifest" href="../manifest/manifest.json">
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin/>
        <link rel="stylesheet" href="../css/gallery.css" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:700">
        <link rel="icon" href="../favicon.ico">
        <script type="application/ld+json">
            <?php include "injectJsonLd.php"; ?>
        </script> 
    </head>
    <body>
		<header>
                <div id="brandingGalleries">
                    <h1><a href="../">SIMON TURTLE</a></h1>     
                </div> 
        </header>       
        <header>   
            <nav id="desktopNavigation">
                <ul id="desktopNavigationItems">
                    <li><a href="../portfolio/">Portfolio</a></li>
                    <li><a href="../portraits/">Portraits</a></li>
                    <li><a href="../archive/">Archive</a></li>
                    <li><a href="../posters/">Posters</a></li>
                    <li class="current"><a href="#">Ella</a></li>
                    <li><a href="../contact/">Contact</a></li>
                </ul>
            </nav>
        </header>
        <header>
            <nav id="mobileNavigation">
                <div id="menuToggle">
                    <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                            <ul id="menu">
                                <li><a href="../portfolio/">Portfolio</a></li>
                                <li><a href="../portraits/">Portraits</a></li>
                                <li><a href="../archive/">Archive</a></li>
                                <li><a href="../posters/">Posters</a></li>
                                <li class="selected"><a href="#">Ella</a></li>
                                <li><a href="../contact/">Contact</a></li>
                            </ul>
                </div>
            </nav>
        </header>
        <script src="../jbcore/juicebox.js"></script>
        <script src="../jbcore/settings.js"></script>	
            <div id="juicebox-container"></div>
        <noscript>
            <?php include "noscript.php"; ?>
        </noscript>
    </body>
</html>