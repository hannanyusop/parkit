<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Sistem Maklumat Pelajar</h4>
                <a href="{{ route('frontend.user.student.index') }}" class="btn btn-app bg-purple">
                    <i class="fas fa-search"></i> Carian Pelajar
                </a>

                <a href="{{ route('frontend.user.student.add') }}" class="btn btn-app bg-navy">
                    <i class="fas fa-user-plus"></i> Daftar Pelajar
                </a>

                <a href="{{ route('frontend.user.kehadiran.ct.index') }}" class="btn btn-app bg-orange">
                    <i class="fas fa-school"></i> Senarai Kelas
                </a>
                <a href="{{ route('frontend.user.kehadiran.ct.today') }}" class="btn btn-app bg-teal">
                    <i class="fas fa-users"></i> Kehadiran Pelajar
                </a>
            </div>
        </div>
    </div>
</div>
