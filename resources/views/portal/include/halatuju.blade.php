<div class="header-inner-nav">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.halatuju')? "active" : "" }}" href="{{ route('frontend.portal.asrama.halatuju') }}">Hala Tuju</a></li>
                    <li class="nav-item"><a class="nav-link {{ (request()->route()->getName() == 'frontend.portal.asrama.dokumentasi' || request()->route()->getName() == 'frontend.portal.asrama.dokumentasi-fail')? "active" : "" }}" href="{{ route('frontend.portal.asrama.dokumentasi') }}">Senarai Dokumen</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
