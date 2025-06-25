@extends('layouts.app')

@section('title', 'Mr. EuroFix - Handyman Services in Orange County')
@section('description', 'Professional handyman services in Orange County. Expert in plumbing, electrical, carpentry, tile, and drywall. Reliable, affordable, and friendly.')
@section('keywords', 'handyman, Orange County, plumbing, electrical, drywall, tile, home repair, Mr. EuroFix, furniture assembly, flooring installation, painting')

@section('content')
    {{-- Пример в будущей админ-панели --}}
    @foreach ($leads as $lead)
        <p>{{ $lead->client_full_name }}</p>
    @endforeach

@endsection
