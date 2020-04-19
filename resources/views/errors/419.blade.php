@extends('errors::minimal')

@section('title',$exception->getMessage() ?: __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
