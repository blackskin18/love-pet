@extends('layouts.app')

@section('link-css')
    <style>
        div.menu{
            background-color: #E9EBEE;
            width: 15%;
            height: 600px;
            float: left;
        }
        div.menu div.list-case{
            width: 100%;
            margin-top: 20px;
            text-align: left ;
        }
        div.menu div.list-case>span{
            height: 30px;
        }
        div.menu div.list-case h3{
            color: #90949c;
            display: block;
            height: 17px;
            line-height: 17px;
            overflow: hidden;
        }
        div.menu div.list-case>div{
            /* border-top: 1px solid #333; */
            font-size: 15px;
            padding-left: 30px;
        }
        div.menu div.list-case>div:hover{
            background-color: #FFFFFF;
        }
        div.menu>div:hover:not(.list-case){
            background-color: #ffffff;
        }
        .container1{
            width: 85%;
            float: right;
        }
    </style>
@endsection
@section('index')
<div style="padding: 0;margin: 0; width: 100%">
    <div class="menu">
        <div class="list-case">
            <span><h3>danh sách</h3></span>
            <div> <span>nhà chung </span></div>
            <div> <span>TNV </span></div>
            <div> <span>Tìm Chủ </span></div>
            <div> <span>Đã Tìm Chủ</span></div>
            <div> <span>đi lạc/ đã chết</span></div>
        </div>
        <div class="hospital">
            <span><h3>phòng khám</h3></span>
        </div>
        <div class="volunteer">
            <span><h3>tình nguyện viên</h3></span>
        </div>
        <div class="owner">
           <span><h3>chủ nuôi</h3></span>
        </div>
        <div class="album">
            <span><h3>ảnh</h3></span>
        </div>
    </div>
    <div class="container1">
        @yield('content')
    </div>
</div>
@endsection
