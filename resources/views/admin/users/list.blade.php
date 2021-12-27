@extends('admin.master')
@section('content-admin')
    @can('admin')
        <div class="card mt-2">
            <h5 class="card-header">Danh sách sản phẩm</h5>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Tên người dùng</th>
                        <th>email</th>
                        <th>Ngày tạo</th>
                        <th>action</th>
                    </tr>
                    @forelse($users as $key => $user)
                        <tr id="product-item-{{$user->id}}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            @if($user->email='admin@gmail.com')
                                <td><a href="" class="btn btn-danger" onclick="confirm('admin khong duoc xoa !!!')">Xóa</a>
                            @else
                            <td><a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger" onclick="confirm('are you sure ?')">Xóa</a>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    @endcan
@endsection
