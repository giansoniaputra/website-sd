<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets2/img/logo/favicon.ico">
    <!-- ========== Start Stylesheet ========== -->
    <link href="/assets2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets2/css/fontawesome.min.css" rel="stylesheet" />
    <link href="/assets2/css/magnific-popup.css" rel="stylesheet" />
    <link href="/assets2/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/assets2/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/assets2/css/animate.css" rel="stylesheet" />
    <link href="/assets2/css/bsnav.min.css" rel="stylesheet" />
    <link href="/assets2/css/flaticon-set.css" rel="stylesheet" />
    <link href="/assets2/css/site-animation.css" rel="stylesheet" />
    <link href="/assets2/css/slick.css" rel="stylesheet" />
    <link href="/assets2/css/themify-icons.css" rel="stylesheet" />
    <link href="/assets2/css/swiper.min.css" rel="stylesheet" />
    <link href="/assets2/css/style.css" rel="stylesheet">
    <link href="/assets2/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	  <script src="/assets2/js/html5/html5shiv.min.js"></script>
	  <script src="/assets2/js/html5/respond.min.js"></script>
	<![endif]-->

</head>
<body id="bdy">
    @include('landing.layoutLanding.headerLanding')

    <main>
        @yield('content')
    </main>

    @include('landing.layoutLanding.footerLanding')

    <!-- Start Scroll top
	============================================= -->
    <a href="#bdy" id="scrtop" class="smooth-menu"><i class="ti-arrow-up"></i></a>
    <!-- End Scroll top-->

    {{-- Smooth Scroll --}}
    <script>
        // Fungsi untuk scroll secara smooth dengan durasi tertentu
        function smoothScroll(targetElement, duration) {
            const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            let startTime = null;

            // Fungsi animasi untuk scroll
            function animation(currentTime) {
                if (startTime === null) startTime = currentTime;
                const timeElapsed = currentTime - startTime;
                const run = ease(timeElapsed, startPosition, distance, duration);
                window.scrollTo(0, run);
                if (timeElapsed < duration) requestAnimationFrame(animation);
            }

            // Fungsi easing untuk membuat scroll halus
            function ease(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            }

            // Memulai animasi scroll
            requestAnimationFrame(animation);
        }

        // Menambahkan event listener ke semua anchor link dengan href yang mengarah ke ID di halaman
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah tindakan default dari link

                const targetId = this.getAttribute('href'); // Mendapatkan ID target
                const targetElement = document.querySelector(targetId); // Mendapatkan elemen target

                if (targetElement) {
                    smoothScroll(targetElement, 300); // Scroll dalam 300ms untuk respon cepat
                }
            });
        });

    </script>

    <!-- jQuery Frameworks 
    ============================================= -->

    <script src="/assets2/js/jquery-1.12.4.min.js"></script>
    <script src="/assets2/js/bootstrap.min.js"></script>
    <script src="/assets2/js/popper.min.js"></script>
    <script src="/assets2/js/jquery.appear.js"></script>
    <script src="/assets2/js/html5/html5shiv.min.js"></script>
    <script src="/assets2/js/html5/respond.min.js"></script>
    <script src="/assets2/js/jquery.easing.min.js"></script>
    <script src="/assets2/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets2/js/progress-bar.min.js"></script>
    <script src="/assets2/js/modernizr.custom.13711.js"></script>
    <script src="/assets2/js/owl.carousel.min.js"></script>
    <script src="/assets2/js/wow.min.js"></script>
    <script src="/assets2/js/isotope.pkgd.min.js"></script>
    <script src="/assets2/js/imagesloaded.pkgd.min.js"></script>
    <script src="/assets2/js/count-to.js"></script>
    <script src="/assets2/js/fontawesome.min.js"></script>
    <script src="/assets2/js/swiper.min.js"></script>
    <script src="/assets2/js/text.js"></script>
    <script src="/assets2/js/YTPlayer.min.js"></script>
    <script src="/assets2/js/slick.min.js"></script>
    <script src="/assets2/js/bsnav.min.js"></script>
    <script src="/assets2/js/jquery.easypiechart.js"></script>
    <script src="/assets2/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $("body").on("click", "#buttonRenderSiswa" ,function(){
                let uuid=$(this).data('uuid')
                let nama_kelas=$(this).data('namakelas')
                $("#nama_kelasSpan").html(nama_kelas)
                $.ajax({
                data: {uuid : uuid },
                url: "/renderSiswa",
                type: "GET",
                dataType: 'json',
                success: function (response) {
                    $("#renderSiswa").html(response.view)
                }
                });
            })
        })
    </script>
</body>
</html>
