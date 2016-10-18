<?php
/**
 * Created by PhpStorm.
 * User: neal
 * Date: 18/10/2016
 * Time: 2:11 AM
 */ ?>

@extends('kinetic.head)


@section('content')
    <body>


    <!-- MAIN CONTAINER -->
    <!--
          ==================================================
              Contact Section Start
          ================================================== -->
    <div id="main-container" class="container-fluid relative full-height"
         style='background: url(images/main_background.jpg) no-repeat;  background-size: cover;'>

        <section id="contact-section">
            <div class="container wrap">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="home.html"><img src="images/logo_index.jpg" alt="Kinetic Communication Sdn. Bhd."/></a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="block">
                            <h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">System
                                Login</h2>
                            <!--<p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, ea!
                                 consectetur adipisicing elit. Dolore, ea!
                            </p>-->
                            <div class="contact-form">
                                <form id="contact-form">

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms"
                                         data-wow-delay=".6s">
                                        <input type="text" placeholder="Your Name">
                                    </div>

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms"
                                         data-wow-delay=".8s">
                                        <input type="email" placeholder="Your Email">
                                    </div>


                                    <div id="submit" class="wow fadeInDown" data-wow-duration="500ms"
                                         data-wow-delay="1.4s">
                                        <a href="home.html"><input type="submit" id="contact-submit"
                                                                   class="btn btn-default btn-send"
                                                                   value="Send Message"></a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </div>


    </body>
@endsection
