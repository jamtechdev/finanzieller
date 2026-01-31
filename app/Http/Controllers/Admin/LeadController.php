<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::query();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $leads = $query->latest()->paginate(20);
        $statusCounts = [
            'all' => Lead::count(),
            'new' => Lead::where('status', 'new')->count(),
            'read' => Lead::where('status', 'read')->count(),
            'contacted' => Lead::where('status', 'contacted')->count(),
        ];

        return view('admin.pages.leads', compact('leads', 'statusCounts'));
    }

    public function show(Lead $lead)
    {
        // Mark as read when viewing
        if ($lead->status === 'new') {
            $lead->markAsRead();
        }

        return view('admin.pages.lead-detail', compact('lead'));
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:new,read,contacted,converted,closed',
        ]);

        $lead->update(['status' => $request->status]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Lead status updated!');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('admin.leads.index')->with('success', 'Lead deleted successfully!');
    }
}
