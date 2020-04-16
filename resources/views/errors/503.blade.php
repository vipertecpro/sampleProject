@extends('errors::minimal')

@section('title',$exception->getMessage() ?: __('Service Unavailable'))
@section('code', '503')
@section('message', $exception->getMessage() ?: __('Service Unavailable'))
