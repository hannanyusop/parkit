<div class="header-inner-nav">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.bmb')? "active" : "" }}" href="{{ route('frontend.portal.asrama.bmb') }}">BMB</a></li>
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.bkb')? "active" : "" }}" href="{{ route('frontend.portal.asrama.bkb') }}">BKB</a></li>
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.ppk')? "active" : "" }}" href="{{ route('frontend.portal.asrama.ppk') }}">PPK</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
