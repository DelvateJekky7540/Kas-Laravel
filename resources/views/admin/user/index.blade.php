@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>INI USER INDEX</h1>
<x-tables.table2 :users="$users"/>
@endsection
