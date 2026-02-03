@extends('admin.layouts.app')

@section('title', __('Contact Leads'))

@section('content')
    <div class="page-header">
        <h1 class="page-title">{{ __('Contact Form Leads') }}</h1>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Status Filters -->
    <div style="margin-bottom: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
        <a href="{{ route('admin.leads.index') }}" 
           class="btn {{ !request('status') || request('status') === 'all' ? 'btn-primary' : 'btn-secondary' }}">
            {{ __('All') }} ({{ $statusCounts['all'] }})
        </a>
        <a href="{{ route('admin.leads.index', ['status' => 'new']) }}" 
           class="btn {{ request('status') === 'new' ? 'btn-primary' : 'btn-secondary' }}">
            {{ __('New') }} ({{ $statusCounts['new'] }})
        </a>
        <a href="{{ route('admin.leads.index', ['status' => 'read']) }}" 
           class="btn {{ request('status') === 'read' ? 'btn-primary' : 'btn-secondary' }}">
            {{ __('Read') }} ({{ $statusCounts['read'] }})
        </a>
        <a href="{{ route('admin.leads.index', ['status' => 'contacted']) }}" 
           class="btn {{ request('status') === 'contacted' ? 'btn-primary' : 'btn-secondary' }}">
            {{ __('Contacted') }} ({{ $statusCounts['contacted'] }})
        </a>
    </div>

    @component('admin.components.card')
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                    <tr style="{{ $lead->status === 'new' ? 'background: #f0fdf4;' : '' }}">
                        <td>
                            <div style="font-weight: 500;">{{ $lead->name }}</div>
                            @if($lead->message)
                                <div style="font-size: 0.75rem; color: #6b7280; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $lead->message }}
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="mailto:{{ $lead->email }}" style="color: var(--color-primary-accent);">{{ $lead->email }}</a>
                        </td>
                        <td>
                            @if($lead->phone)
                                <a href="tel:{{ $lead->phone }}" style="color: var(--color-primary-accent);">{{ $lead->phone }}</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <select onchange="updateStatus({{ $lead->id }}, this.value)" 
                                    style="padding: 0.25rem 0.5rem; border-radius: 0.25rem; border: 1px solid #e5e7eb; font-size: 0.875rem;">
                                <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>{{ __('New') }}</option>
                                <option value="read" {{ $lead->status === 'read' ? 'selected' : '' }}>{{ __('Read') }}</option>
                                <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>{{ __('Contacted') }}</option>
                                <option value="converted" {{ $lead->status === 'converted' ? 'selected' : '' }}>{{ __('Converted') }}</option>
                                <option value="closed" {{ $lead->status === 'closed' ? 'selected' : '' }}>{{ __('Closed') }}</option>
                            </select>
                        </td>
                        <td style="white-space: nowrap;">
                            {{ $lead->created_at->format('M d, Y') }}<br>
                            <span style="font-size: 0.75rem; color: #6b7280;">{{ $lead->created_at->format('H:i') }}</span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-secondary" style="padding: 0.25rem 0.75rem;">
                                    {{ __('View') }}
                                </a>
                                <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" style="display: inline;"
                                      onsubmit="return confirm('{{ __('Are you sure you want to delete this lead?') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding: 0.25rem 0.75rem;">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 2rem; color: #6b7280;">
                            {{ __('No leads found.') }}
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endcomponent

    <div style="margin-top: 2rem;">
        {{ $leads->links() }}
    </div>

    <script>
        function updateStatus(leadId, status) {
            fetch(`/admin/leads/${leadId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: status })
            }).then(response => {
                if (response.ok) {
                    // Optionally show a success message
                }
            });
        }
    </script>
@endsection
