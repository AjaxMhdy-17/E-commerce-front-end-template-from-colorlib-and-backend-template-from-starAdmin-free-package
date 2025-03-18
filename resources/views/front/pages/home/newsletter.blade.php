<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{asset('uset/assets/images/send.png')}}" alt="img"></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="{{route('user.newsletter.store')}}" class="newsletter_form" method="post">
                            @csrf
                            <input type="email" name="email" class="newsletter_input" requiired="required" placeholder="Enter your email address">
                            <button type="submit" class="newsletter_button">Subscribe</button>
                            <div style="color : red">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>