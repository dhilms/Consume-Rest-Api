@include('layout.head')

<center><h2>Create New</h2></center>
<br>
<hr>

<div class="container-lg ">
    <div class="p-3 mb-2 bg-info text-white rounded-3">
<form method="POST" action="{{ url()->current() }}" class="row g-3">
    @method('PUT')
    @csrf

    <div class="col-md-6">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="nama_depan" placeholder="Insert ur First Name" value="{{ $user['firstName'] }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="nama_belakang" placeholder="Insert ur Last Name" value="{{ $user['lastName'] }}">
      </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</div>
</form>
</div>
