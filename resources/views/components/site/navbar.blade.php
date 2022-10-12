<div class="header {{ $class ?? 'header-transparent dark-text' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="#">
                            <img {{-- src="{{ asset('site/img/logo.png') }}" --}} src="{{ asset('site/img/c-1.png') }}" class="logo"
                                alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">

                            <li class="active"><a href="/">Home<span class=""></span></a>
                            </li>


                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            @guest
                                <li class="add-listing ">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#login">
                                        <i class="ti-user mr-1"></i> Sign in
                                    </a>
                                </li>
                            @endguest

                            @auth
                                <li class="add-listing ">
                                    <a
                                        href="@switch(auth()->user()->role)
                                        @case('user')
                                            {{ route('site.user.dashboard') }}
                                            @break

                                        @case('client')
                                            {{ route('site.client.dashboard') }}
                                            @break

                                        @default

                                    @endswitch">
                                        <i class="ti-user mr-1"></i> {{ auth()->user()->name }}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
