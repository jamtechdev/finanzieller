@extends('admin.layouts.app')

@section('title', 'Edit Services')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">Edit Services</h1>
        <button type="submit" form="services-form" class="btn btn-primary">
            <span style="margin-right:0.5rem">💾</span> Save Changes
        </button>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <form id="services-form" action="{{ route('admin.services.update') }}" method="POST">
        @csrf
        
        @component('admin.components.card', ['title' => 'Services Section'])
            <div class="form-group">
                <label class="form-label">Section Title</label>
                <input type="text" name="services[title]" class="form-input" 
                       value="{{ $services['title'] ?? '' }}" placeholder="Our Services">
            </div>
            
            <hr style="margin: 1.5rem 0; border: none; border-top: 1px solid #e5e7eb;">
            
            <div id="services-container">
                @php $serviceItems = $services['items'] ?? []; @endphp
                @foreach($serviceItems as $index => $service)
                <div class="service-item" style="margin-bottom: 1.5rem; padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <strong>Service #{{ $index + 1 }}</strong>
                        <button type="button" class="btn btn-danger remove-service" style="padding: 0.25rem 0.75rem;">Remove</button>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Service Title</label>
                        <input type="text" name="services[items][{{ $index }}][title]" class="form-input" 
                               value="{{ $service['title'] ?? '' }}" placeholder="Service name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="services[items][{{ $index }}][description]" class="form-input" rows="3" 
                                  placeholder="Service description...">{{ $service['description'] ?? '' }}</textarea>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Icon (optional)</label>
                        <input type="text" name="services[items][{{ $index }}][icon]" class="form-input" 
                               value="{{ $service['icon'] ?? '' }}" placeholder="images/icons/service.png">
                    </div>
                </div>
                @endforeach
            </div>
            
            <button type="button" id="add-service" class="btn btn-secondary">+ Add Service</button>
        @endcomponent
    </form>

    <script>
        let serviceIndex = {{ count($serviceItems ?? []) }};

        document.getElementById('add-service').addEventListener('click', function() {
            const container = document.getElementById('services-container');
            const html = `
                <div class="service-item" style="margin-bottom: 1.5rem; padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <strong>Service #${serviceIndex + 1}</strong>
                        <button type="button" class="btn btn-danger remove-service" style="padding: 0.25rem 0.75rem;">Remove</button>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Service Title</label>
                        <input type="text" name="services[items][${serviceIndex}][title]" class="form-input" placeholder="Service name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="services[items][${serviceIndex}][description]" class="form-input" rows="3" placeholder="Service description..."></textarea>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Icon (optional)</label>
                        <input type="text" name="services[items][${serviceIndex}][icon]" class="form-input" placeholder="images/icons/service.png">
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            serviceIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-service')) {
                e.target.closest('.service-item').remove();
            }
        });
    </script>
@endsection
