<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\Service;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $requests = ServiceRequest::with(['service', 'citizen'])
            ->latest()
            ->paginate(10);
            
        return view('service-requests.index', compact('requests'));
    }

    public function create(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
        return view('service-requests.create', compact('service'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'nik' => 'required|digits:16',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'documents.*' => 'nullable|file|max:2048',
            'notes' => 'nullable|string',
            'agreement' => 'required|accepted'
        ]);

        $service = Service::findOrFail($validated['service_id']);

        // Find or create citizen
        $citizen = Citizen::firstOrCreate(
            ['nik' => $validated['nik']],
            [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email']
            ]
        );

        // Upload documents
        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $index => $file) {
                $path = $file->store('documents', 'public');
                $documents[] = [
                    'name' => $service->requirements[$index] ?? 'Document ' . ($index + 1),
                    'path' => $path
                ];
            }
        }

        // Create service request
        $serviceRequest = ServiceRequest::create([
            'citizen_id' => $citizen->id,
            'service_id' => $validated['service_id'],
            'tracking_number' => ServiceRequest::generateTrackingNumber(),
            'status' => 'pending',
            'notes' => $validated['notes'],
            'documents' => $documents
        ]);

        return redirect()
            ->route('service-requests.show', $serviceRequest)
            ->with('success', 'Permohonan layanan berhasil diajukan. Nomor tracking: ' . $serviceRequest->tracking_number);
    }

    public function show(ServiceRequest $serviceRequest)
    {
        $serviceRequest->load(['service', 'citizen']);
        return view('service-requests.show', compact('serviceRequest'));
    }

    public function track()
    {
        return view('service-requests.track');
    }

    public function trackResult(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string'
        ], [
            'tracking_number.required' => 'Nomor pelacakan harus diisi'
        ]);

        $serviceRequest = ServiceRequest::with(['service', 'citizen'])
                                      ->where('tracking_number', $request->tracking_number)
                                      ->first();

        if (!$serviceRequest) {
            return redirect()
                ->route('service-requests.track')
                ->with('error', 'Nomor pelacakan tidak ditemukan');
        }

        return view('service-requests.track', ['request' => $serviceRequest]);
    }
}
