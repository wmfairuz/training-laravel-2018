<ol>
@foreach ($user_list as $user)
    <li>{{ $user->name }}</li>
@endforeach
</ol>