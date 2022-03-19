@include('layout.head');
{{-- Container  --}}
<div class="container-md">
    <center><h2>Consume REST API</h2></center>
    <hr>

    {{-- Button Create --}}
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('users.create') }}"> Create</a>
    </div><br>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
    </div>

    {{-- Table  --}}
    <table class="table table-striped table-hover table-bordered">
        @php
        $number = 1;
        @endphp

        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Full Name</th>
            <th style="width: 150px">Action</th>
          </tr>
        </thead>
        @forelse($users['data'] as $user)
            <tr>
                <td>{{ $number++ }}</td>
                <td>{{ $user['firstName'] }}</td>
                <td>{{ $user['lastName'] }}</td>
                <td>{{ $user['firstName'] }} {{ $user['lastName'] }}</td>
                <td>
                    <form method="POST" action="{{ 'users/'.$user['id'] }}">
                        @method('DELETE')
                        @csrf

                        <a href="{{ 'users/'.$user['id'] }}" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
                        <button type="submit" class="text-danger btn btn-link" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
        @endforelse
      </table>
</div>

