<div>
    <input wire:model="search" type="text" class="form-control" placeholder="Search users..."/>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>NRIC</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->unique_id }}</td>
                    <td>@include('backend.auth.user.includes.status')</td>
                    <td>
                        @include('backend.auth.user.includes.actions')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <ul>
    </ul>
</div>
