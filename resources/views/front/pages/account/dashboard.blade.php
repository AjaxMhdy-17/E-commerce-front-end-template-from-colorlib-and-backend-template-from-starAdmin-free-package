@extends('front.layout.main')

@section('title')
dashboard
@endsection


@section('content')



<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">My Orders</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-4">
            <div class="container">
                <h3 class="d-none">Account</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0">
                                    <div class="card-body">
                                        <div class="list-group list-group-flush"> <a href="{{route('user.dashboard')}}" class="list-group-item active d-flex justify-content-between align-items-center">Dashboard <i class="bx bx-tachometer fs-5"></i></a>
                                            <a href="account-orders.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders <i class="bx bx-cart-alt fs-5"></i></a>
                                            <a href="account-downloads.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Downloads <i class="bx bx-download fs-5"></i></a>
                                            <a href="account-addresses.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Addresses <i class="bx bx-home-smile fs-5"></i></a>
                                            <a href="account-payment-methods.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class="bx bx-credit-card fs-5"></i></a>
                                            <a href="account-user-details.html" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Account Details <i class="bx bx-user-circle fs-5"></i></a>

                                            <form action="{{route('user.logout')}}" method="post">
                                                @csrf
                                                <button type="submit" style="background:transparent ; border : 0 ; outline : 0 ; width : 100% ; padding : 16px ">

                                                    <div style="border: 0; padding : 0 ; color : #fff ; " class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class="bx bx-log-out fs-5"></i></div>

                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <form id="logout-form" action="{{ route('user.logout') }}" method="post">
                                            @csrf
                                        </form>
                                        <p>Hello <strong>{{$user->name}}</strong> (not <strong>{{$user->name}}</strong> <a href="javascript:;" onclick="document.getElementById('logout-form').submit();">Logout</a>)</p>

                                        <p>From your account dashboard you can view your Recent Orders, manage your shipping and billing addesses and edit your password and account details</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>



@endsection