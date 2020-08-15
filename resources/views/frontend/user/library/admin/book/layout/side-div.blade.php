<div class="card">
    <div class="card-body">

        <h5 class="font-weight-bold mb-4 text-center">Pengurusan Buku</h5>

        <div class="row">
            <a href="{{ route('frontend.user.library.index') }}" class="btn btn-app bg-purple">
                <i class="fa fa-book-reader"></i> Utama
            </a>
            <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-app bg-success">
                <i class="fa fa-book"></i> Senarai Buku
            </a>
            <a href="{{ route('frontend.user.library.admin.book.add') }}" class="btn btn-app bg-teal">
                <i class="fa fa-plus"></i> Tambah Buku
            </a>
            <a href="{{ route('frontend.user.library.admin.book.print-label') }}" class="btn btn-app bg-blue">
                <i class="fa fa-print"></i> Cetak Label
            </a>
            <a href="{{ route('frontend.user.library.admin.book.group.index') }}" class="btn btn-app bg-pink">
                <i class="fa fa-bookmark"></i> Pengkelasan
            </a>
            <a href="{{ route('frontend.user.library.admin.book.author.index') }}" class="btn btn-app bg-fuchsia">
                <i class="fa fa-signature"></i> Penulis Buku
            </a>
            <a href="{{ route('frontend.user.library.admin.book.publisher.index') }}" class="btn btn-app bg-navy">
                <i class="fa fa-people-carry"></i> Penerbit Buku
            </a>
        </div>
    </div>
</div>
