
@extends('admin.index')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">

            <div class="card-body px-0 pt-0 pb-2">

            <div class="container mt-5">
                <h1>Edit Supplier Information</h1>
                <form action="{{ route('suppliers.update', ['supplier' => $editSupplier['company_id']]) }}" method="PUT">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="company_id" name="company_id" value="{{ $editSupplier['company_id'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $editSupplier['company_name'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="short_name" class="form-label">Transaction Name</label>
                        <input type="text" class="form-control" id="transaction_name" name="transaction_name" value="{{ $editSupplier['transaction_name'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $editSupplier['address'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $editSupplier['email'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $editSupplier['phone'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Fax</label>
                        <input type="tel" class="form-control" id="fax" name="fax" value="{{ $editSupplier['fax'] }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
</div>

@endsection
