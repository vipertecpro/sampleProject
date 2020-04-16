@extends('errors::minimal')

@section('title',$exception->getMessage() ?: __('Server Error'))
@section('code', '500')
@section('message',$exception->getMessage() ?: __('Server Error'))
