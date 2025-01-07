<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Kursus;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'kursus'])->latest()->paginate(10);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $users = User::all();
        $kursuses = Kursus::all();
        return view('payments.create', compact('users', 'kursuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kursus_id' => 'required|exists:kursuses,id',
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|string|in:completed,pending',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment added successfully.');
    }

    public function edit(Payment $payment)
    {
        $users = User::all();
        $kursuses = Kursus::all();
        return view('payments.edit', compact('payment', 'users', 'kursuses'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kursus_id' => 'required|exists:kursuses,id',
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|string|in:completed,pending',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
