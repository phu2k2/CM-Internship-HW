@extends('layout.app')

@section('title', 'Add Supply')

@section('content')
<form>
  <div class="p-5" style="width: 60%:">
    <h2 class="text-center">Add Supply</h2>
    <div class="mb-3">
      <label for="inputName" class="form-label">Company Name</label>
      <input type="text" class="form-control" id="inputName" name="company_name">
    </div>

    <div class="mb-3">
      <label for="inputTransaction " class="form-label">Transaction Name</label>
      <input type="text" class="form-control" id="inputTransaction " name="transaction_name">
    </div>

    <div class="mb-3">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" class="form-control" id="inputAddress" name="address">
    </div>

    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail" name="email">
    </div>

    <div class="mb-3">
      <label for="inputPhone" class="form-label">Phone Number</label>
      <input type="text" class="form-control" id="inputPhone" name="phone_number">
    </div>
    <div class="mb-3">
      <label for="inputFax" class="form-label">Fax</label>
      <input type="text" class="form-control" id="inputFax" name="fax">
    </div>
  </div>

  <!-- Modal Footer -->
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Add Supply</button>
  </div>

</form>
@endsection