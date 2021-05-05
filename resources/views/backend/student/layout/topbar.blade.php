<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.student.index') }}" class="btn btn-app">
                    <i class="fas fa-search"></i> {{ __('Student List') }}
                </a>

                <a href="{{ route('admin.class.index') }}" class="btn btn-app">
                    <i class="fas fa-school"></i> {{ __('Class Lists') }}
                </a>

                <a href="{{ route('admin.student.add') }}" class="btn btn-app">
                    <i class="fas fa-user-plus"></i> {{ __('Add Student') }}
                </a>

                <a href="{{ route('admin.student.import') }}" class="btn btn-app">
                    <i class="fas fa-upload"></i> {{ __('Import Data') }}
                </a>

                <a href="{{ route('admin.student.reset') }}" class="btn btn-app">
                    <i class="fas fa-redo"></i> {{ __('Reset Data') }}
                </a>
            </div>
        </div>
    </div>
</div>
