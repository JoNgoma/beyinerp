@extends('base')
@section('title', 'Créer un contact')

@section('content')
<div class="card shadow-sm rounded p-0 mt-4">
    <div class="border-bottom p-3">
        <div class="d-flex align-items-center">
            <a href="{{ route('contacts.index') }}" class="btn btn-link text-dark me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h5 class="mb-0">Créer un contact</h5>
        </div>
    </div>

    <form action="{{ route('contacts.store') }}" method="POST" class="p-4">
        @csrf
        <div class="d-flex flex-column gap-4" style="max-width: 500px;">
            <div class="mb-2">
                <div class="rounded-circle bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center" style="width: 150px; height: 150px">
                    <i class="bi bi-person-fill text-secondary" style="font-size: 6rem"></i>
                </div>
            </div>

            <div class="input-group" style="height: 48px;">
                <span class="input-group-text bg-transparent border-end-0">
                    <i class="bi bi-person text-muted"></i>
                </span>
                <input type="text" class="form-control form-control-lg border-start-0 @error('names') is-invalid @enderror" 
                    id="names" name="names" value="{{ old('names') }}" 
                    placeholder="Noms" required>
                @error('names')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group" style="height: 48px;">
                <span class="input-group-text bg-transparent border-end-0">
                    <i class="bi bi-envelope text-muted"></i>
                </span>
                <input type="email" class="form-control form-control-lg border-start-0 @error('email') is-invalid @enderror" 
                    id="email" name="email" value="{{ old('email') }}" 
                    placeholder="Email" required>
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group" style="height: 48px;">
                <span class="input-group-text bg-transparent border-end-0">
                    <i class="bi bi-telephone text-muted"></i>
                </span>
                <input type="tel" class="form-control form-control-lg border-start-0 @error('tel') is-invalid @enderror" 
                    id="tel" name="tel" value="{{ old('tel') }}" 
                    placeholder="Téléphone" required>
                @error('tel')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group mb-4" style="height: 48px;">
                <span class="input-group-text bg-transparent border-end-0">
                    <i class="bi bi-tag text-muted"></i>
                </span>
                <input type="text" class="form-control form-control-lg border-start-0 @error('libele') is-invalid @enderror" 
                    id="libele" name="libele" value="{{ old('libele') }}" 
                    placeholder="Libellé">
                @error('libele')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
            <a href="{{ route('contacts.index') }}" class="btn btn-light">Annuler</a>
            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
