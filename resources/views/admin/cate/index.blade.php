@extends('admin.layout.base')
@section('content')
@if (Session::has('success'))
    <div class="col-12">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="col-3">
        <div class="card @error('msg') card-danger @else card-primary @enderror">
            <div class="card-header">
            <h3 class="card-title">@error('msg') {{$message}} @else Thêm danh mục @enderror</h3>
            </div>
            <form action="{{route('admin.cate.index')}}" method="POST" >
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter name">
                    @error('name')
                        <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug">
                </div>
                <div class="form-group">
                    <label for="parent_id">Parent</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">Danh mục cha</option>
                        @if ($parent)
                            @foreach ($parent as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <input type="text" class="form-control" id="summary" name="summary" placeholder="Enter summary">
                </div>
                <input type="hidden" value="1" name="type" />
                @csrf
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="categories" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="10%">STT</th>
                    <th>Name</th>
                    <th>Summary</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if ($data)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->summary}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>X</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Summary</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
@push('addfooter')
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
        $("#categories").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#categories_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
