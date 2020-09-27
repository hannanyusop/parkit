<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.student.index') }}" class="btn btn-app">
                    <i class="fas fa-search"></i> Senarai Pelajar
                </a>

{{--                <a href="{{ route('frontend.user.student.add') }}" class="btn btn-app">--}}
{{--                    <i class="fas fa-user-plus"></i> Daftar Pelajar--}}
{{--                </a>--}}

                <a href="{{ route('admin.class.index') }}" class="btn btn-app">
                    <i class="fas fa-school"></i> Senarai Kelas
                </a>

                <a href="{{ route('admin.student.import') }}" class="btn btn-app">
                    <i class="fas fa-upload"></i> Import Data Pelajar
                </a>

                <a href="{{ route('admin.student.reset') }}" class="btn btn-app">
                    <i class="fas fa-redo"></i> Reset Data Pelajar
                </a>
            </div>
        </div>
    </div>
</div>
