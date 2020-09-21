<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('frontend.user.student.index') }}" class="btn btn-app">
                    <i class="fas fa-search"></i> Carian Pelajar
                </a>

{{--                <a href="{{ route('frontend.user.student.add') }}" class="btn btn-app">--}}
{{--                    <i class="fas fa-user-plus"></i> Daftar Pelajar--}}
{{--                </a>--}}

                <a href="{{ route('frontend.user.kehadiran.ct.index') }}" class="btn btn-app">
                    <i class="fas fa-school"></i> Senarai Kelas
                </a>

                <a href="{{ route('frontend.user.kehadiran.index') }}" class="btn btn-app">
                    <i class="fas fa-users"></i> Kehadiran
                </a>

                @can('Portal Admin')
                    <a href="{{ route('frontend.user.student.import') }}" class="btn btn-app">
                        <i class="fas fa-upload"></i> Import Data Pelajar
                    </a>
                @endcan
            </div>
        </div>
    </div>
</div>
