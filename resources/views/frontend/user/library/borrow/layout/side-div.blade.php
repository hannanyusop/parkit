
<div class="card">
    <div class="card-body text-center">
        <div class="row">
            <h3 class="card-title mb-4">Peminjaman Buku</h3>
        </div>

        <div class="row">
            <a href="{{ route('frontend.user.library.index') }}" class="btn btn-app bg-navy">
                <i class="fas fa-home"></i> Utama
            </a>
            <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="btn btn-app bg-fuchsia">
                <i class="fas fa-hands"></i> Peminjaman
            </a>

            <a href="{{ route('frontend.user.library.borrow.return') }}" class="btn btn-app bg-purple">
                <i class="fas fa-handshake"></i> Pemulangan
            </a>

            <a href="{{ route('frontend.user.library.borrow.late') }}" class="btn btn-app bg-olive">
                <i class="fas fa-balance-scale"></i> Senarai Lewat
            </a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
