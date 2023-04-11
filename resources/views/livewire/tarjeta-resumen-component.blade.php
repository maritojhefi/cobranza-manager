<div class="main-container container">
    <!-- welcome user -->
    <div class="row mb-4">
        <div class="col-auto">
            <div class="avatar avatar-50 shadow rounded-10">
                <img src="{{asset('')}}img/user1.jpg" alt="">
            </div>
        </div>
        <div class="col align-self-center ps-0">
            <h4 class="text-color-theme"><span class="fw-normal">Hi</span>, Maxartkiller</h4>
            <p class="text-muted">Good Morning</p>
        </div>
    </div>

    <!-- money request received -->
    <div class="row mb-4 hideonprogress" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-44 shadow-sm rounded-10">
                                <img src="{{asset('')}}img/user3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="small mb-1"><a href="profile.html" class="fw-medium">Shelvey</a> <span class="text-muted">requested money</span></p>
                            <p>150 <span class="text-muted">$</span> <small class="text-muted">1 min ago</small>
                            </p>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-44 btn-default shadow-sm">
                                <i class="bi bi-arrow-up-right-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12">
                        <div class="progress bg-none h-2 hideonprogressbar" data-target="hideonprogress">
                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 99%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- swiper credit cards -->
    <div class="row mb-3">
        <div class="col-12 px-0">
            <div class="swiper-container cardswiper swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" id="swiper-wrapper-df58415a87e6105ba" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-auto align-self-center">
                                        <img src="{{asset('')}}img/masterocard.png" alt="">
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="small">
                                            <span class="text-uppercase size-10">Validity</span><br>
                                            <span class="text-muted">09/24</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="fw-normal mb-2">
                                            150540.00
                                            <span class="small text-muted">USD</span>
                                        </h4>
                                        <p class="mb-0 text-muted size-12">10141 0021 0001 0154</p>
                                        <p class="text-muted size-12">Debit Card</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 3">
                        <div class="card dark-bg" style="background-image: url({{asset('')}}img/backgorund-image3.svg);">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-auto align-self-center">
                                        <img src="{{asset('')}}img/masterocard.png" alt="">
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="small">
                                            <span class="text-uppercase size-10">Validity</span><br>
                                            <span class="text-muted">06/25</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="fw-normal mb-2">
                                            56040.00
                                            <span class="small text-muted">USD</span>
                                        </h4>
                                        <p class="mb-0 text-muted size-12">10141 0021 0001 0154</p>
                                        <p class="text-muted size-12">Debit Card</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="3 / 3">
                        <div class="card theme-radial-gradient border-0">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-auto align-self-center">
                                        <i class="bi bi-wallet2"></i> Wallet
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="small">
                                            <span class="text-uppercase size-10">Validity</span><br>
                                            <span class="text-muted">Unlimited</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="fw-normal mb-2">
                                            100.00
                                            <span class="small text-muted">USD</span>
                                        </h4>
                                        <p class="mb-0 text-muted size-12">10141 0021 0001 0154</p>
                                        <p class="text-muted size-12">Debit Card</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </div>

    <!-- connection -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Connections</h6>
        </div>
        <div class="col-auto">
            <a href="userlist.html" class="small">View all</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 px-0">
            <!-- swiper users connections -->
            <div class="swiper-container connectionwiper swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" id="swiper-wrapper-d4b5add164fc7eee" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user4.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">Nicolas</p>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user2.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">Shelvey</p>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide" role="group" aria-label="3 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user3.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">Amenda</p>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide" role="group" aria-label="4 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user1.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">RXL15</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide" role="group" aria-label="5 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user4.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">Nicolas</p>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide" role="group" aria-label="6 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user2.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">Shelvey</p>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide" role="group" aria-label="7 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user3.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">Amenda</p>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide" role="group" aria-label="8 / 8">
                        <a href="profile.html" class="card text-center">
                            <div class="card-body">
                                <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                                    <img src="{{asset('')}}img/user1.jpg" alt="">
                                </figure>
                                <p class="text-color-theme size-12 small">RXL15</p>
                            </div>
                        </a>
                    </div>
                </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </div>

    <!-- offers banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card theme-bg text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col align-self-center">
                            <h1>15% OFF</h1>
                            <p class="size-12 text-muted">
                                On every bill pay, launch offer get 5% Extra
                            </p>
                            <div class="tag border-dashed border-opac">
                                BILLPAY15OFF
                            </div>
                        </div>
                        <div class="col-6 align-self-center ps-0">
                            <img src="{{asset('')}}img/offergraphics.png" alt="" class="mw-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dark mode switch -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkmodeswitch">
                        <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Activate Dark
                            Mode</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Saving targets -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Saving Targets</h6>
        </div>
        <div class="col-auto">

        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="circle-small">
                                <div id="circleprogressone"><svg viewBox="0 0 100 100" style="display: block; width: 100%;"><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="#d8e0f9" stroke-width="10" fill-opacity="0"></path><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="rgb(114,151,248)" stroke-width="10" fill-opacity="0" style="stroke-dasharray: 282.783, 282.783; stroke-dashoffset: 98.9741;"></path></svg></div>
                                <div class="avatar avatar-30 alert-primary text-primary rounded-circle">
                                    <i class="bi bi-globe"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto align-self-center ps-0">
                            <p class="small mb-1 text-muted">USA Trip</p>
                            <p>60<span class="small">%</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="circle-small">
                                <div id="circleprogresstwo"><svg viewBox="0 0 100 100" style="display: block; width: 100%;"><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="#d8f4eb" stroke-width="10" fill-opacity="0"></path><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="rgb(58,199,155)" stroke-width="10" fill-opacity="0" style="stroke-dasharray: 282.783, 282.783; stroke-dashoffset: 42.4175;"></path></svg></div>
                                <div class="avatar avatar-30 alert-success text-success rounded-circle">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto align-self-center ps-0">
                            <p class="small mb-1 text-muted">Car loan</p>
                            <p>85<span class="small">%</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-40 alert-danger text-danger rounded-circle">
                                <i class="bi bi-house"></i>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="small text-muted mb-0">Home Loan</p>
                                    <p>3510.00 $</p>
                                </div>
                                <div class="col-auto text-end">
                                    <p class="small text-muted mb-0">Next EMI</p>
                                    <p class="small">1 Aug 2024</p>
                                </div>
                            </div>

                            <div class="progress alert-danger h-4">
                                <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transactions -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Transactions<br><small class="fw-normal text-muted">Today, 24 Aug 2021</small>
            </h6>
        </div>
        <div class="col-auto align-self-center">
            <a href="transactions.html" class="small">View all</a>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 px-0">
            <ul class="list-group list-group-flush bg-none">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10 ">
                                <img src="{{asset('')}}img/company4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Zomato</p>                                   
                            <p class="text-muted size-12">Food</p>
                        </div>                                
                        <div class="col align-self-center text-end">
                            <p class="mb-0">-25.00</p>                                   
                            <p class="text-muted size-12">Debit Card 4545</p>
                        </div>
                    </div>
                </li>
                
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10">
                                <img src="{{asset('')}}img/company5.png" alt="">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Uber</p>                                   
                            <p class="text-muted size-12">Travel</p>
                        </div>                                
                        <div class="col align-self-center text-end">
                            <p class="mb-0">-26.00</p>                                   
                            <p class="text-muted size-12">Debit Card 4545</p>
                        </div>
                    </div>
                </li>
                
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10">
                                <img src="{{asset('')}}img/company1.png" alt="">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Starbucks</p>                                   
                            <p class="text-muted size-12">Food</p>
                        </div>                                
                        <div class="col align-self-center text-end">
                            <p class="mb-0">-18.00</p>                                   
                            <p class="text-muted size-12">Cash</p>
                        </div>
                    </div>
                </li>
                
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10">
                                <img src="{{asset('')}}img/company3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Walmart</p>                                   
                            <p class="text-muted size-12">Clothing</p>
                        </div>                                
                        <div class="col align-self-center text-end">
                            <p class="mb-0">-105.00</p>                                   
                            <p class="text-muted size-12">Wallet</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Blogs -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">News and Upcomming</h6>
        </div>
        <div class="col-auto align-self-center">
            <a href="blog.html" class="small">Read more</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <a href="blog-details.html" class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-60 shadow-sm rounded-10 coverimg" style="background-image: url({{asset('')}}img/news.jpg);">
                                <img src="{{asset('')}}img/news.jpg" alt="" style="display: none;">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-1">Do share and Earn a lot</p>                                   
                            <p class="text-muted size-12">Get $10 instant as reward while your friend or invited member join FiMobile</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 col-md-6 col-lg-4">
            <a href="blog-details.html" class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-60 shadow-sm rounded-10 coverimg" style="background-image: url({{asset('')}}img/news1.jpg);">
                                <img src="{{asset('')}}img/news1.jpg" alt="" style="display: none;">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-1">Walmart news latest picks</p>                                   
                            <p class="text-muted size-12">Get $10 instant as reward while your friend or invited member join FiMobile</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 col-md-6 col-lg-4">
            <a href="blog-details.html" class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-60 shadow-sm rounded-10 coverimg" style="background-image: url({{asset('')}}img/news2.jpg);">
                                <img src="{{asset('')}}img/news2.jpg" alt="" style="display: none;">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-1">Do share and Help us</p>                                   
                            <p class="text-muted size-12">Get $10 instant as reward while your friend or invited member join FiMobile</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>