@extends('errors::minimal')

@section('title',$exception->getMessage() ?: __('Unauthorized'))
@section('code', '401')
@section('message',$exception->getMessage() ?: __('Unauthorized'))
