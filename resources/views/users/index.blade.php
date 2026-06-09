@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Manajemen User</h1>
        <p class="text-xs text-slate-500 mt-1">Kelola akun admin dan penghuni yang terdaftar di sistem.</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Peran</th>
                    <th class="py-3 px-4">Tautan Penghuni</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                @forelse($users as $user)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="py-3.5 px-4">{{ $user->name }}</td>
                    <td class="py-3.5 px-4">{{ $user->email }}</td>
                    <td class="py-3.5 px-4">{{ ucfirst($user->role) }}</td>
                    <td class="py-3.5 px-4">{{ optional($user->penghuni)->nama ?? '-' }}</td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-8 text-center text-slate-400">Belum ada akun terdaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
