@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <h5 class="card-header">Data Profil</h5>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('profile.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    value="{{ auth()->user()->name }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Nama Pengguna</label>
                                <input class="form-control" type="text" id="username" name="username" readonly disabled
                                    value="{{ auth()->user()->username }}" placeholder="" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Alamat E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" />
                            </div>
                            @if (auth()->user()->market)
                                <div class="mb-3 col-md-6">
                                    <label for="market" class="form-label">Pasar</label>
                                    <input type="text" class="form-control" id="market" name="market" readonly
                                        disabled value="{{ auth()->user()->market->name ?? '-' }}" />
                                </div>
                            @endif
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="whatsapp_number">Nomor WhatsApp (WA)</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">ID (+62)</span>
                                    <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control"
                                        placeholder="81234567899" />
                                </div>
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            {{-- <button type="reset" class="btn btn-label-secondary">Cancel</button> --}}
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
