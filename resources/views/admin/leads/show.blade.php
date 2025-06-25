@extends('layouts.app')

@section('title', 'Mr. EuroFix - Handyman Services in Orange County')
@section('description', 'Professional handyman services in Orange County. Expert in plumbing, electrical, carpentry, tile, and drywall. Reliable, affordable, and friendly.')
@section('keywords', 'handyman, Orange County, plumbing, electrical, drywall, tile, home repair, Mr. EuroFix, furniture assembly, flooring installation, painting')

@section('content')
    {{-- Пример в будущей админ-панели --}}
    <h3>Заявка от: {{ $lead->client_full_name }}</h3>

    @if ($lead->uploaded_files_urls)
        <p>Прикрепленные файлы:</p>
        <ul>
            @foreach ($lead->uploaded_files_urls as $filePath)
                <li>
                    <a href="{{ route('admin.leads.serve_file', ['path' => $filePath]) }}" target="_blank">
                        Просмотреть файл: {{ basename($filePath) }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
