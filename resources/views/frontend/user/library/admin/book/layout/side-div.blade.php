<div class="card">
    <div class="card-body">

        <h5 class="font-weight-bold mb-4 text-center">Pengurusan Buku</h5>

        <div class="row">
            <a href="{{ route('frontend.user.library.index') }}" class="btn btn-primary btn-block"><i class="fa fa-book-reader"></i> <b> Utama</b></a>
            <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-primary btn-block"><i class="fa fa-book"></i> <b> Senarai Buku</b></a>
            <a href="{{ route('frontend.user.library.admin.book.add') }}" class="btn btn-primary btn-block"><i class="fa fa-book-dead"></i> <b> Tambah Buku</b></a>
            <a href="{{ route('frontend.user.library.admin.book.group.index') }}" class="btn btn-primary btn-block"><i class="fa fa-bookmark"></i> <b>Pengkelasan Perpuluhan Dewey</b></a>
            <a href="{{ route('frontend.user.library.admin.book.author.index') }}" class="btn btn-primary btn-block"><i class="fa fa-signature"></i> <b>Book Author</b></a>
            <a href="{{ route('frontend.user.library.admin.book.publisher.index') }}" class="btn btn-primary btn-block"><i class="fa fa-people-carry"></i> <b>Book Publisher</b></a>

        </div>
    </div>
</div>
