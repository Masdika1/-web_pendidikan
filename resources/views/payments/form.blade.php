@csrf
<div class="mb-6">
    <label for="user_id" class="block text-lg font-semibold text-gray-700 mb-2">User</label>
    <select name="user_id" id="user_id"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500">
        <option value="">Select User</option>
        @foreach($users as $user)
        <option value="{{ $user->id }}" {{ old('user_id', $payment->user_id ?? '') == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-6">
    <label for="kursus_id" class="block text-lg font-semibold text-gray-700 mb-2">Kursus</label>
    <select name="kursus_id" id="kursus_id"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500">
        <option value="">Select Kursus</option>
        @foreach($kursuses as $kursus)
        <option value="{{ $kursus->id }}" {{ old('kursus_id', $payment->kursus_id ?? '') == $kursus->id ? 'selected' : '' }}>
            {{ $kursus->title }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-6">
    <label for="amount" class="block text-lg font-semibold text-gray-700 mb-2">Amount</label>
    <input type="number" name="amount" id="amount" step="0.01" value="{{ old('amount', $payment->amount ?? '') }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500">
</div>

<div class="mb-6">
    <label for="payment_status" class="block text-lg font-semibold text-gray-700 mb-2">Payment Status</label>
    <select name="payment_status" id="payment_status"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500">
        <option value="completed" {{ old('payment_status', $payment->payment_status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="pending" {{ old('payment_status', $payment->payment_status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
    </select>
</div>
