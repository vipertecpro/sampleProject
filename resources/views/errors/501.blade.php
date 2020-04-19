@extends('errors::minimal')

@section('title',$exception->getMessage() ?: __('Not Implemented'))
@section('code', '501')
@section('message',$exception->getMessage() ?: __('Not Implemented'))
