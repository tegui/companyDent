

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">

            <div class="item active">
                    <img class="img-responsive" src="http://localhost/companyDent/images/Imagen1.jpg" alt="">
			</div>
            <div class="item">
                    <img class="img-responsive" src="http://localhost/companyDent/images/Imagen2.jpg" alt="">
			</div>
			<div class="item">
                    <img class="img-responsive" src="http://localhost/companyDent/images/Imagen3.jpg" alt="">
			</div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <div class="">

    </div>

    <!-- jQuery -->
    <script src="http://localhost/companyDent/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/companyDent/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>


</body>

</html>
