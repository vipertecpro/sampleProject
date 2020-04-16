@extends('errors::minimal')

@section('title',$exception->getMessage() ?: __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
