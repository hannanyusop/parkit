<div class="card">
    <div class="card-body">

        <h5 class="font-weight-bold mb-4 text-center">Pengurusan Buku</h5>

        <div class="row">
            <a href="{{ route('frontend.user.library.index') }}" class="btn btn-app bg-white">
                <i class="fa fa-book-reader"></i> Utama
            </a>
            <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-app bg-white">
                <i class="fa fa-book"></i> Senarai Buku
            </a>
            <a href="{{ route('frontend.user.library.admin.book.add') }}" class="btn btn-app bg-white">
                <i class="fa fa-plus"></i> Tambah Buku
            </a>
            <a href="{{ route('frontend.user.library.admin.book.print-label') }}" class="btn btn-app bg-white">
                <i class="fa fa-print"></i> Cetak Label
            </a>
            <a target="_blank" href="{{ route('frontend.user.library.admin.book.print-list') }}" class="btn btn-app bg-white">
                <i class="fa fa-table"></i> Cetak Senarai
            </a>
            <a href="{{ route('frontend.user.library.admin.book.group.index') }}" class="btn btn-app bg-white">
                <i class="fa fa-bookmark"></i> Pengkelasan
            </a>
        </div>
    </div>
</div>
