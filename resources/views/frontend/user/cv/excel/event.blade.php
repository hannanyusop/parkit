<table>
    <tr><td></td></tr>
    <tr>
        <td colspan="6">Event Name: {{ $event->name }}</td>
    </tr>
    <tr>
        <td colspan="6">Date: {{ reformatDatetime($event->created_at, "d M Y") }}</td>
    </tr>
    <tr><td></td></tr>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <td>NRIC / Unique ID</td>
        <th>Date</th>
        <th>Time</th>
        <th>Temperature(°C)</th>
    </tr>
    @foreach($event->users as $key => $log)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $log->user->name }}</td>
            <td>{{ $log->user->unique_id }}</td>
            <td>{{ reformatDatetime($log->created_at, "H:i A") }}</td>
            <td>{{ reformatDatetime($log->created_at, "d M Y") }}</td>
            <td>{{ $log->temperature }}</td>
        </tr>
    @endforeach
</table>
