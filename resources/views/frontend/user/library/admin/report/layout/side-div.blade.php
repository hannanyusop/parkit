
<div class="card">
    <div class="card-body text-center">
        <div class="row">
            <h3 class="card-title mb-4">Laporan Data</h3>
        </div>

        <div class="row">
            <a href="{{ route('frontend.user.library.index') }}" class="btn btn-app bg-info">
                <i class="fas fa-home"></i> Utama
            </a>
            <a href="{{ route('frontend.user.library.admin.report.index') }}" class="btn btn-app bg-navy">
                <i class="fas fa-moon"></i> Harian
            </a>
            <a href="{{ route('frontend.user.library.admin.report.monthly') }}" class="btn btn-app bg-fuchsia">
                <i class="fas fa-calendar"></i> Bulanan
            </a>
        </div>

        <div class="row">
            <h3 class="card-title mb-4">Laporan Data Pelajar</h3>
        </div>
        <div class="row">
            <a href="{{ route('frontend.user.library.admin.report.student-top-borrower-monthly') }}" class="btn btn-app bg-pink">
                <i class="fas fa-book-reader"></i> Peminjaman Buku
            </a>
            <div class="row">
                <a href="{{ route('frontend.user.library.admin.report.student-monthly-visit') }}" class="btn btn-app bg-navy">
                    <i class="fas fa-user-check"></i> Kunjungan
                </a>
            </div>
        </div>

        <div class="row">
            <h3 class="card-title mb-4">Laporan Data Staff</h3>
        </div>
        <div class="row">
            <a href="{{ route('frontend.user.library.admin.report.staff-monthly-visit') }}" class="btn btn-app bg-navy">
                <i class="fas fa-user-check"></i> Kunjungan
            </a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
