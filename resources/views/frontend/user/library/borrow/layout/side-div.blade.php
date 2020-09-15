
<div class="card">
    <div class="card-body text-center">
        <div class="row">
            <h5 class="card-title mb-4">Peminjaman Buku</h5>
        </div>

        <div class="row">
            <a href="{{ route('frontend.user.library.index') }}" class="btn btn-app bg-white">
                <i class="fas fa-home"></i> Utama
            </a>
            <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="btn btn-app bg-white">
                <i class="fas fa-hands"></i> Peminjaman
            </a>

            <a href="{{ route('frontend.user.library.borrow.return') }}" class="btn btn-app bg-white">
                <i class="fas fa-handshake"></i> Pemulangan
            </a>

            <a href="{{ route('frontend.user.library.borrow.late') }}" class="btn btn-app bg-white">
                <i class="fas fa-balance-scale"></i> Senarai Lewat
            </a>
            <a href="{{ route('frontend.user.library.borrow.fine') }}" class="btn btn-app bg-white">
                <i class="fa fa-file-invoice-dollar"></i> Denda
            </a>
            <a href="{{ route('frontend.user.library.borrow.history') }}" class="btn btn-app bg-white">
                <i class="fa fa-history"></i> Log Peminjam
            </a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
