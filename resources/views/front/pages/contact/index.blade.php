@extends('front.layout.main')

@section('title')
home page
@endsection


@section('content')


<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="col-md-4 my-2">
                <!-- Contact Item -->
                <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                    <div class="contact_info_image">
                        <img src="{{asset('uset/assets/images/contact_1.png')}}" alt="img" />
                        <link rel="stylesheet" type="text/css" href="">
                    </div>
                    <div class="contact_info_content">
                        <div class="contact_info_title">Phone</div>
                        <div class="contact_info_text">+38 068 005 3570</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <!-- Contact Item -->
                <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                    <div class="contact_info_image">
                        <img src="{{asset('uset/assets/images/contact_2.png')}}" alt="img" />
                    </div>
                    <div class="contact_info_content">
                        <div class="contact_info_title">Email</div>
                        <div class="contact_info_text">fastsales@gmail.com</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <!-- Contact Item -->
                <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                    <div class="contact_info_image">

                        <img src="{{asset('uset/assets/images/contact_3.png')}}" alt="img" />
                    </div>
                    <div class="contact_info_content">
                        <div class="contact_info_title">Address</div>
                        <div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact_form_container">
                    <div class="contact_form_title">Get in Touch</div>
                </div>
            </div>
        </div>

        <form action="#" id="contact_form" class="row">

            <div class="col-md-4">
                <input type="text" style="width : 100%" id="contact_form_name" class="contact_form_name input_field my-2" placeholder="Your name" required="required" data-error="Name is required.">
            </div>

            <div class="col-md-4">
                <input type="text" style="width : 100%" id="contact_form_email" class="contact_form_email input_field my-2" placeholder="Your email" required="required" data-error="Email is required.">

            </div>

            <div class="col-md-4">
                <input type="text" style="width : 100%" id="contact_form_phone" class="contact_form_phone input_field my-2" placeholder="Your phone number">
            </div>


            <div class="col-12 my-4">
                <div class="contact_form_text">
                    <textarea id="contact_form_message" class="text_field contact_form_message my-2" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="contact_form_button">
                    <button type="submit" class="button contact_submit_button">Send Message</button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel"></div>
</div>

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="#" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button class="newsletter_button">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection