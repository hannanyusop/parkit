<div class="card">
    <div class="card-body text-center">

        <h5 class="font-weight-bold mb-4">Book Management</h5>

        <div class="row">
            <a href="{{ route('frontend.user.library.index') }}" class="btn btn-primary btn-block"><i class="fa fa-book-reader"></i> <b> Library Dashboard</b></a>
            <a href="{{ route('frontend.user.library.admin.book.index') }}" class="btn btn-primary btn-block"><i class="fa fa-book"></i> <b> Book</b></a>
            <a href="{{ route('frontend.user.library.admin.book.group.index') }}" class="btn btn-primary btn-block"><i class="fa fa-bookmark"></i> <b>Group</b></a>
            <a href="{{ route('frontend.user.library.admin.book.author.index') }}" class="btn btn-primary btn-block"><i class="fa fa-signature"></i> <b>Book Author</b></a>
            <a href="{{ route('frontend.user.library.admin.book.publisher.index') }}" class="btn btn-primary btn-block"><i class="fa fa-people-carry"></i> <b>Book Publisher</b></a>

        </div>
    </div>
</div>
