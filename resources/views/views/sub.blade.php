@include('views.maquee',['run_content'=>"tessss"])
@extends('views.layout')
@section('title','Layout sub')

@section('sidebar')
    <p>test</p>
    @parent

@stop
@section('noidung')
    đây là trang sub
    <?php
        $hoten = "<b>Xuan Can Traing</b>";
        $diem = 1;
        ?>
        {{$hoten}}
        {!! $hoten !!}
    @if($diem<5)
        hoc sinh yeu
    @elseif( $diem > 5 && $diem <=7)
        hoc sinh trung binh
    @else
        Hoc sinh gioi
    @endif

    {{isset($diems)?$diem:'Khong co diem'}}
    <hr>
    {{-- comment in laravel--}}
@stop
