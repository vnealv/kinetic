<?php
/**
 * Created by PhpStorm.
 * User: neal
 * Date: 18/10/2016
 * Time: 2:11 AM
 */ ?>

@extends('kinetic.head')


@section('content')
    <body>


    <!-- MAIN CONTAINER -->
    <!--
          ==================================================
              Contact Section Start
          ================================================== -->
    <div id="main-container" class="container-fluid relative full-height"
         style='background: url({{ asset('images/kinetic/main_background.jpg') }}) no-repeat;  background-size: cover;'>
        {{--/Applications/MAMP/htdocs/kinetic/public/images/kinetic/main_background.jpg--}}

        <section id="contact-section">
            <div class="container wrap">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="home.html"><img src="{{ asset('images/kinetic/logo_index.jpg') }}"
                                                 alt="Kinetic Communication Sdn. Bhd."/></a>
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
                                {{--<form id="contact-form">--}}
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url(config('backpack.base.route_prefix').'/login') }}">
                                    {!! csrf_field() !!}

                                    <div class="form-group wow fadeInDown{{ $errors->has('email') ? ' has-error' : '' }}"
                                         data-wow-duration="500ms"
                                         data-wow-delay=".6s">
                                        {{--<input type="text" placeholder="Your Name">--}}
                                        <input type="email" class="" name="email" value="{{ old('email') }}"
                                               placeholder="Your Email">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group wow fadeInDown{{ $errors->has('password') ? ' has-error' : '' }}"
                                         data-wow-duration="500ms"
                                         data-wow-delay=".8s">
                                        {{--<input type="email" placeholder="Your Email">--}}
                                        <input type="password" class="" name="password"
                                               placeholder="Your Password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                    <div id="submit" class="wow fadeInDown" data-wow-duration="500ms"
                                         data-wow-delay="1.4s">
                                        <input type="submit" id="login-submit"
                                               class="btn btn-default btn-send"
                                               value="Login">
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
