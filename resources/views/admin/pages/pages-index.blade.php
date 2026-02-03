@extends('admin.layouts.app')

@section('title', __('Pages'))

@section('content')
    <div class="page-header">
        <h1 class="page-title">{{ __('Menu Pages') }}</h1>
        <p style="color: #6b7280; margin-top: 0.25rem;">{{ __('All site pages. Click Edit to update content. Changes appear on the public website.') }}</p>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-container">
                <table class="admin-table" style="width: 100%; border-collapse: collapse; min-width: 600px;">
                    <thead>
                        <tr style="border-bottom: 1px solid #e5e7eb; background: #f9fafb;">
                            <th style="text-align: left; padding: 0.75rem 1rem; font-weight: 600;">{{ __('Page') }}</th>
                            <th style="text-align: left; padding: 0.75rem 1rem; font-weight: 600;">{{ __('Description') }}</th>
                            <th style="text-align: left; padding: 0.75rem 1rem; font-weight: 600;">{{ __('Last updated') }}</th>
                            <th style="text-align: right; padding: 0.75rem 1rem; font-weight: 600;">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="padding: 0.75rem 1rem; font-weight: 500;">{{ $page['name'] }}</td>
                                <td style="padding: 0.75rem 1rem; color: #6b7280; font-size: 0.875rem;">{{ $page['description'] }}</td>
                                <td style="padding: 0.75rem 1rem; color: #6b7280; font-size: 0.875rem;">
                                    @if(!empty($page['updated_at']))
                                        {{ $page['updated_at']->format('d.m.Y H:i') }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td style="padding: 0.75rem 1rem; text-align: right;">
                                    <a href="{{ $page['edit_route'] }}" class="btn btn-primary" style="padding: 0.25rem 0.75rem; font-size: 0.875rem;">
                                        {{ __($page['edit_label']) }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
