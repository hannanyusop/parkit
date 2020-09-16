
<div class="card">
    <div class="card-header">
        <h4>Peminjaman</h4>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a href="{{ route('frontend.user.library.index') }}" class="nav-link">Utama</a></li>
            <li class="nav-item"><a href="{{ route('frontend.user.library.borrow.borrow') }}" class="nav-link {{ (request()->route()->getName() == "frontend.user.library.borrow.borrow")? "active" : "" }}">Peminjaman</a></li>
            <li class="nav-item"><a href="{{ route('frontend.user.library.borrow.return') }}" class="nav-link {{ (request()->route()->getName() == "frontend.user.library.borrow.return")? "active" : "" }}">Pemulangan</a></li>
            <li class="nav-item"><a href="{{ route('frontend.user.library.borrow.late') }}" class="nav-link {{ (request()->route()->getName() == "frontend.user.library.borrow.late")? "active" : "" }}">Senarai Lewat</a></li>
            <li class="nav-item"><a href="{{ route('frontend.user.library.borrow.fine') }}" class="nav-link {{ (request()->route()->getName() == "frontend.user.library.borrow.fine")? "active" : "" }}">Denda</a></li>
            <li class="nav-item"><a href="{{ route('frontend.user.library.borrow.history') }}" class="nav-link {{ (request()->route()->getName() == "frontend.user.library.borrow.history")? "active" : "" }}">Log Peminjam</a></li>
        </ul>
    </div>
</div>
