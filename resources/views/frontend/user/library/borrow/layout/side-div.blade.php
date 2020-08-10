
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Action</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0" style="display: block;">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item active">
                <a href="{{ route('frontend.user.library.borrow.borrow') }}" class="nav-link">
                    <i class="fas fa-handshake"></i> Borrow
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('frontend.user.library.borrow.return') }}" class="nav-link">
                    <i class="fas fa-hand-holding"></i> Return
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('frontend.user.library.borrow.late') }}" class="nav-link">
                    <i class="fa fa-hand-holding-usd"></i> Late List
                    <span class="badge bg-warning float-right">12</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.card-body -->
</div>
