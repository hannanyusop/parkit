
<div class="card">
    <div class="card-body text-center">
        <div class="row">
            <h3 class="card-title mb-4">Laporan Data</h3>
        </div>

        <div class="row">
            <a href="{{ route('frontend.user.library.admin.report.index') }}" class="btn btn-app bg-navy">
                <i class="fas fa-moon"></i> Harian
            </a>
            <a href="{{ route('frontend.user.library.admin.report.monthly') }}" class="btn btn-app bg-fuchsia">
                <i class="fas fa-calendar"></i> Bulanan
            </a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
