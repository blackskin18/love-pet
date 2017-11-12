<?php 
    $user_id = Auth::user()->id;
    $user_roles = App\UserRole::where('user_id', $user_id)->get();
    $check_admin = 0;
    foreach ($user_roles as $key => $user_role) {
        if($user_role->role_id <= 3){
            $check_admin = 1;
        }
    }
?>
@extends('layouts.app_no_search')

@section('index')
<div class="col-lg-12">
    <div class="row">
        <div class="menu">
            <div class="list-case">
                <span><h3>Danh sách</h3></span>
                <a href="/home" style="display: block; width: 100%; height: 100%"><div> <span>Tất Cả </span> </div> </a>
                <a href="/animal/list-in-common-home" style="display: block; width: 100%; height: 100%"><div> <span>Nhà Chung </span> </div> </a>
                <a href="/animal/list_ready_to_find_the_owner" style="display: block; width: 100%; height: 100%"><div> <span>Tìm Chủ </span> </div> </a>
                <a href="/animal/list_has_owner" style="display: block; width: 100%; height: 100%"><div> <span>Đã Tìm Chủ</span> </div> </a>
                <a href="/animal/list_die" style="display: block; width: 100%; height: 100%"><div> <span>Đi Lạc/ Đã Chết </span> </div> </a>
            </div>
            <div class="hospital">
                <a href="/hospital/list"><span><h3>Phòng Khám</h3></span></a>
            </div>
            <div class="volunteer">
                <a href='/volunteer/list'><span><h3>Tình Nguyện Viên</h3></span></a>
            </div>
            <div class="owner">
                <a href="/volunteer/list_owner">
                   <span><h3>Chủ Nuôi</h3></span>
               </a>
            </div>
            <div class="album">
                <a href="/animal/list_image/all">
                    <span><h3>Ảnh</h3></span>
                </a>
            </div>
            <div class="histories">
                <a href="/histories">
                    <span><h3>Lịch sử Hoạt động</h3></span>
                </a>
            </div>
            @if($check_admin == 1)
                <div class="owner">
                    <a href="/admin/create_user"><span><h3>Thêm Tài Khoản</h3></span></a>
                </div>
                 <div class="owner">
                    <a href="/admin/create_case"><span><h3>Tạo Case</h3></span></a>
                </div>
            @endif
        </div>
        <div class="col-sm-10">
            @yield('content')
        </div>
    </div>
</div>
@endsection
