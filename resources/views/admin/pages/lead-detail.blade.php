@extends('admin.layouts.app')

@section('title', 'Lead Details')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">Lead Details</h1>
        <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">← Back to Leads</a>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
        <div>
            @component('admin.components.card', ['title' => 'Message'])
                <div style="white-space: pre-wrap; line-height: 1.6;">{{ $lead->message ?? 'No message provided.' }}</div>
            @endcomponent
        </div>
        
        <div>
            @component('admin.components.card', ['title' => 'Contact Information'])
                <div style="margin-bottom: 1rem;">
                    <div style="font-size: 0.75rem; color: #6b7280; text-transform: uppercase; margin-bottom: 0.25rem;">Name</div>
                    <div style="font-weight: 500;">{{ $lead->name }}</div>
                </div>
                
                <div style="margin-bottom: 1rem;">
                    <div style="font-size: 0.75rem; color: #6b7280; text-transform: uppercase; margin-bottom: 0.25rem;">Email</div>
                    <a href="mailto:{{ $lead->email }}" style="color: var(--color-primary-accent);">{{ $lead->email }}</a>
                </div>
                
                @if($lead->phone)
                <div style="margin-bottom: 1rem;">
                    <div style="font-size: 0.75rem; color: #6b7280; text-transform: uppercase; margin-bottom: 0.25rem;">Phone</div>
                    <a href="tel:{{ $lead->phone }}" style="color: var(--color-primary-accent);">{{ $lead->phone }}</a>
                </div>
                @endif
                
                <div style="margin-bottom: 1rem;">
                    <div style="font-size: 0.75rem; color: #6b7280; text-transform: uppercase; margin-bottom: 0.25rem;">Submitted</div>
                    <div>{{ $lead->created_at->format('F d, Y \a\t H:i') }}</div>
                </div>
                
                <div>
                    <div style="font-size: 0.75rem; color: #6b7280; text-transform: uppercase; margin-bottom: 0.25rem;">Status</div>
                    <form action="{{ route('admin.leads.status', $lead) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()" 
                                style="padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #e5e7eb; width: 100%;">
                            <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="read" {{ $lead->status === 'read' ? 'selected' : '' }}>Read</option>
                            <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="converted" {{ $lead->status === 'converted' ? 'selected' : '' }}>Converted</option>
                            <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </form>
                </div>
            @endcomponent
            
            <div style="margin-top: 1.5rem; display: flex; gap: 1rem;">
                <a href="mailto:{{ $lead->email }}" class="btn btn-primary w-full">
                    📧 Send Email
                </a>
                @if($lead->phone)
                <a href="tel:{{ $lead->phone }}" class="btn btn-secondary w-full">
                    📞 Call
                </a>
                @endif
            </div>
        </div>
    </div>
@endsection
