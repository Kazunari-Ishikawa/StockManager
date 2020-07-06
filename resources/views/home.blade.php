@extends('layouts.app')

@section('content')

<app-component :user='@json($user)'></app-component>

@endsection
