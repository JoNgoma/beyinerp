@extends('base')
@section('title', 'Contacts')

@section('content')
<div class="card contact-card p-4 mt-1" style="max-height: 88vh; overflow-y: auto;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-4">
            <h5 class="mb-0 fw-normal">Contacts</h5>
            <div class="input-group" style="width: 500px;">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input id="searchInput" type="text" class="form-control" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr id="table-header">
                    <th style="width: 35%">Contact</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 20%">Téléphone</th>
                    <th>Libellés</th>
                    <th style="width: 100px"></th>
                </tr>
                <tr class="selection-header" id="selection-bar">
                    <td colspan="4" id="selected-count"></td>
                    <td class="text-end">
                        <i class="bi bi-trash delete-selected" title="Supprimer la sélection"></i>
                    </td>
                </tr>
            </thead>
            <style>
                .contact-row:hover {
                    color:rgb(121, 156, 179) !important; 
                    cursor: pointer; 
                }
            </style>

            <style>
                .contact-row:hover .contact-info,
                .contact-row:hover .contact-email,
                .contact-row:hover .contact-tel {
                    color: #0d6efd; /* Couleur primaire de Bootstrap */
                }
            </style>

            <style>
                thead {
                    position: sticky;
                    top: 0;
                    background-color: white; /* Optional: to ensure the header has a background */
                    z-index: 10; /* Optional: to ensure the header stays above other content */
                }
            </style>

            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="contact-row" onclick="window.location='{{ route('contacts.show', ['name' => $contact->names, 'id' => $contact->id]) }}';">
                        <td>
                            <div class="contact-info">
                                <label class="contact-icon-wrapper mb-0">
                                    <input type="checkbox" class="form-check-input contact-checkbox" onclick="event.stopPropagation();">
                                    <div class="contact-icon">
                                        <i class="bi bi-person-fill fs-4"></i>
                                    </div>
                                </label>
                                {{ $contact->names }}
                            </div>
                        </td>
                        <td class="contact-email">{{ $contact->email }}</td>
                        <td class="contact-tel">{{ $contact->tel }}</td>
                        <td>
                            <span class="badge">{{ $contact->libele }}</span>
                        </td>
                        <td>
                            <div class="icon-actions d-flex gap-1 justify-content-end">
                                <a href="{{ route('contacts.edit', ['name' => $contact->names, 'id' => $contact->id]) }}" style="text-decoration: none;">
                                    <i class="bi bi-pencil" title="Modifier"></i>
                                </a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce contact ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="bi bi-trash" title="Supprimer"></i></button>
                                </form>                                    
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">
                            <i class="bi bi-person-lines-fill d-block"></i>
                            <span class="text-secondary">Aucun contact trouvé.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.contact-checkbox');
            const selectionBar = document.getElementById('selection-bar');
            const tableHeader = document.getElementById('table-header');
            const selectedCount = document.getElementById('selected-count');

            function updateSelectionDisplay() {
                const checked = document.querySelectorAll('.contact-checkbox:checked');
                const count = checked.length;

                if (count > 0) {
                    selectedCount.textContent = `${count} contact${count > 1 ? 's' : ''} sélectionné${count > 1 ? 's' : ''}`;
                    selectionBar.style.display = 'table-row';
                    tableHeader.style.display = 'none';
                } else {
                    selectionBar.style.display = 'none';
                    tableHeader.style.display = 'table-row';
                }
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', updateSelectionDisplay);
            });
        });

        document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('.contact-row');

        rows.forEach(row => {
            const name = row.querySelector('.contact-info').textContent.toLowerCase();
            const email = row.querySelector('.contact-email').textContent.toLowerCase();
            const tel = row.querySelector('.contact-tel').textContent.toLowerCase();
            if (name.includes(searchValue) || email.includes(searchValue) || tel.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    </script>
@endsection
