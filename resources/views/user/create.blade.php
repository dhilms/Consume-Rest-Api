@include('layout.head')

<center><h2>Create New</h2></center>
<br>
<hr>

<div class="container-lg ">
    <div class="p-3 mb-2 bg-info text-white rounded-3">
<form action="{{ route('users.store') }}" method="POST" class="row g-3">
    @csrf
        <div class="col-md-6">
          <label class="form-label">First Name</label>
          <input type="text" class="form-control" name="nama_depan" placeholder="Insert ur First Name">
        </div>
        <div class="col-md-6">
          <label class="form-label">Last Name</label>
          <input type="text" class="form-control" name="nama_belakang" placeholder="Insert ur Last Name">
        </div>
        <div class="col-12">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Insert ur Email">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
</div>
</form>
</div>

