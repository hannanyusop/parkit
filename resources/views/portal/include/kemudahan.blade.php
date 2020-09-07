<div class="header-inner-nav">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.kemudahan')? "active" : "" }}" href="{{ route('frontend.portal.asrama.kemudahan') }}">Asrama</a></li>
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.dewan-makan')? "active" : "" }}" href="{{ route('frontend.portal.asrama.dewan-makan') }}">Dewan Makan</a></li>
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.surau')? "active" : "" }}" href="{{ route('frontend.portal.asrama.surau') }}">Surau</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
