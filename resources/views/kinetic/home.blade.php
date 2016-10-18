<?php
/**
 * Created by PhpStorm.
 * User: neal
 * Date: 18/10/2016
 * Time: 1:30 AM
 */ ?>

@extends('kinetic.head')

@section('content')
    <body>
    <!--
    ==================================================
    Header Section Start
    ================================================== -->
    <header id="top-bar" class="navbar-fixed-top animated-header">
        <div class="container">
            <div class="navbar-header">
                <!-- responsive nav button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->

                <!-- logo -->
                <div class="navbar-brand">
                    <a href="index.html">
                        <img src="{{ asset('images/kinetic/logo.jpg') }}" alt="">
                    </a>
                </div>
                <!-- /logo -->
            </div>
            <!-- main menu -->
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Corporate Identity</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Advertising Guidelines <span
                                        class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="404.html">Structural requirement </a></li>
                                    <li><a href="gallery.html">Council Guidelines</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#">OOH Creative Guidelines</a></li>
                        <li><a href="#">Material Requirement</a></li>
                        <li><a href="#">Latest OOH Landscape</a></li>

                    </ul>
                </div>
            </nav>
            <!-- /main nav -->
        </div>
    </header>

    <!--
    ==================================================
    Slider Section Start
    ================================================== -->
    <section id="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block wow fadeInUp" data-wow-delay=".3s">

                        <!-- Slider -->
                        <section class="cd-intro">
                            <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
                                <span>WELCOME SUNWAY</span><br>
                                <!--<span class="cd-words-wrapper">
                                    <b class="is-visible">WELCOME SUNWAY</b>
                                    <b>DEVELOPER</b>
                                    <b>FATHER</b>
                                </span>
                                </h1>
                                </section> <!-- cd-intro -->
                                <!-- /.slider
                                <h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
                                    With 10 years experience, I've occupied many roles including digital design director,<br> web designer and developer. This site showcases some of my work.
                                </h2>-->
                                <a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green"
                                   data-wow-delay=".9s" href="#works" data-section="#works">Read more about us</a>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#main-slider-->
    <!--
    ==================================================
    Slider Section Start
    ================================================== -->

    <section id="works" class="works">
        <div class="container">
            <!--<div class="section-heading">
                <h1 class="title wow fadeInDown" data-wow-delay=".3s">Latest Works</h1>
                <p class="wow fadeInDown" data-wow-delay=".5s">
                    Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit amet est. Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus.
                </p>
            </div>-->
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
                            data-wow-delay="0ms">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/kinetic/item-1.jpg') }}" class="img-responsive"
                                 alt="this is a title">
                            <div class="overlay">
                                <div class="buttons">
                                    <a rel="gallery" class="fancybox" href="{{ asset('images/kinetic/item-1.jpg') }}">Demo</a>
                                    <a target="_blank" href="#">Details</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h4>
                                <a href="#">
                                    Site Deployment
                                </a>
                            </h4>
                            <p>
                                Find out more here.
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/kinetic/item-2.jpg') }}" class="img-responsive"
                                 alt="this is a title">
                            <div class="overlay">
                                <div class="buttons">
                                    <a rel="gallery" class="fancybox" href="{{ asset('images/kinetic/item-2.jpg') }}">Demo</a>
                                    <a target="_blank" href="#">Details</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h4>
                                <a href="#">
                                    Site Inventory
                                </a>
                            </h4>
                            <p>
                                Find out more here.
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/kinetic/item-3.jpg') }}" class="img-responsive" alt="">
                            <div class="overlay">
                                <div class="buttons">
                                    <a rel="gallery" class="fancybox" href="{{ asset('images/kinetic/item-3.jpg') }}">Demo</a>
                                    <a target="_blank" href="#">Details</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h4>
                                <a href="#">
                                    Competition
                                </a>
                            </h4>
                            <p>
                                Find out more here.
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
                        <div class="img-wrapper">
                            <img src="{{ asset('images/kinetic/item-4.jpg') }}" class="img-responsive" alt="">
                            <div class="overlay">
                                <div class="buttons">
                                    <a rel="gallery" class="fancybox" href="{{ asset('images/kinetic/item-4.jpg') }}">Demo</a>
                                    <a target="_blank" href="#">Details</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h4>
                                <a href="#">
                                    Calendar
                                </a>
                            </h4>
                            <p>
                                Find out more here.
                            </p>
                        </figcaption>
                    </figure>
                </div>

            </div>
        </div>
    </section> <!-- #works -->


    <!--
    ==================================================
    Footer Section Start
    ================================================== -->
    <footer id="footer">
        <div class="container">
            <div class="col-md-8">
                <p class="copyright">Copyright &copy; <span>2016</span> Kinetic Communication Sdn. Bhd. | <a href="#">CONTACT
                        US</a></p>
            </div>
            <div class="col-md-4">
                <!-- Social Media -->
                <ul class="social">
                    <li>
                        <a href="#" class="Facebook">
                            <i class="ion-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="Twitter">
                            <i class="ion-social-twitter"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </footer> <!-- /#footer -->

    </body>

@endsection

