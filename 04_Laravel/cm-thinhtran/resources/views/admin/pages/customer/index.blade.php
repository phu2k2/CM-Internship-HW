@extends('admin.index')

@section('content')

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="d-flex justify-content-between" >
                <div class="card-header pb-0">
                    <h6>Customers</h6>
                  </div>
                  <div class="card-header pb-0 ">
                    <button type="button" class="btn btn-primary badge badge-sm bg-gradient-success" data-bs-toggle="modal" data-bs-target="#AddCustomerModal">
                        Add customer
                    </button>
                 </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                    <td>
                        <div class="d-flex px-3 py-1">
                            <h6 class="mb-0 text-sm">{{ $customer['id'] }}</h6>
                            </div>
                        </div>
                    </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $customer['company_name'] }} - {{ $customer['short_name'] }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $customer['city'] }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{ $customer['email'] }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{ $customer['phone'] }}</p>
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('customers.edit', ['customer' => $customer['id']]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            <span class="badge badge-sm bg-gradient-success">Edit</span>
                        </a>

                        <a href="{{ route('customers.destroy', ['customer' => $customer['id']]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            <span class="badge badge-sm bg-gradient-success ">Delete</span>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


        <!-- The Modal Add Customer-->
        <div class="modal fade" id="AddCustomerModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Enter Information</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{route('customers.store')}}" method="POST">
                        @csrf
                    <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id">ID:</label>
                                <input type="text" class="form-control" id="id" name="id">
                            </div>
                            <div class="mb-3">
                                <label for="company_name">Company Name:</label>
                                <input type="text" class="form-control" id="company_name" name="company_name">
                            </div>
                            <div class="mb-3">
                                <label for="short_name">Short Name:</label>
                                <input type="text" class="form-control" id="short_name" name="short_name">
                            </div>
                            <div class="mb-3">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="other_info">Other Information:</label>
                                <textarea class="form-control" id="other_info" name="other_info"></textarea>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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