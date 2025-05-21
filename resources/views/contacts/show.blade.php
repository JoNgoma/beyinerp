@extends('base')
@section('title', $contact->names)

@section('content')
<div class="card shadow-sm rounded p-0 mt-4">
    <div class="border-bottom p-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a href="{{ route('contacts.index') }}" class="btn btn-link text-dark me-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h5 class="mb-0">{{ $contact->names }}</h5>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('contacts.edit', ['name' => $contact->names, 'id' => $contact->id]) }}" class="btn btn-light">
                    <i class="bi bi-pencil me-2"></i>Modifier
                </a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')">
                        <i class="bi bi-trash me-2"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="d-flex flex-column gap-4" style="max-width: 500px;">
            <div class="mb-2 text-center">
                <div class="rounded-circle bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px">
                    <i class="bi bi-person-fill text-secondary" style="font-size: 6rem"></i>
                </div>
            </div>

            <div class="list-group list-group-flush">
                <div class="list-group-item px-0">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-envelope fs-5 text-muted"></i>
                        <div>
                            <small class="text-muted d-block">Email</small>
                            <span>{{ $contact->email }}</span>
                        </div>
                    </div>
                </div>

                <div class="list-group-item px-0">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-telephone fs-5 text-muted"></i>
                        <div>
                            <small class="text-muted d-block">Téléphone</small>
                            <span>{{ $contact->tel }}</span>
                        </div>
                    </div>
                </div>

                @if($contact->libele)
                <div class="list-group-item px-0">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-tag fs-5 text-muted"></i>
                        <div>
                            <small class="text-muted d-block">Libellé</small>
                            <span>{{ $contact->libele }}</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
