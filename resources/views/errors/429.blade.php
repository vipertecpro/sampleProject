@extends('errors::minimal')

@section('title',$exception->getMessage() ?: __('Too Many Requests'))
@section('code', '429')
@section('message',$exception->getMessage() ?: __('Too Many Requests'))
