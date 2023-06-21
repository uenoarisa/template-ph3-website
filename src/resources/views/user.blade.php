@foreach($users as $user)
    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>
    <p>{{ $user->created_ato }}</p>
@endforeach