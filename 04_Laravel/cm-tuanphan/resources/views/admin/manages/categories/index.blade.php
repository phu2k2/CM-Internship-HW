@extends('admin.layouts.layout1')
@section('modal')
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addCategoryModal">Thêm danh mục sản phẩm</h1>
        </div>
        <div class="modal-body">
            @if ($errors->any())
            @section('modalTrigger')document.querySelector('[data-bs-target="#addCategoryModal"]').click();@endsection
            @endif
            <form id="addCategoryForm" method="post" action="{{ route('categories.store') }}">
                @csrf
                <label>ID danh mục</label>
                <input class="form-control" placeholder="ID danh mục" name="category_id"/>
                <label>Tên danh mục</label>
                <input class="form-control" placeholder="Tên danh mục" name="category_name"/>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" form="addCategoryForm">Thêm danh mục</button>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Danh mục sản phẩm</h6>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Thêm danh mục sản phẩm</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID danh mục</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên danh mục</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hành động</th>    
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{$index + 1}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$category->category_id}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$category->category_name}}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('categories.edit', ['category'=>$category->id]) }}" class="btn btn-success">Edit</a>
                                        <button class="btn btn-danger">Xóa</button>
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
</div>
@endsection