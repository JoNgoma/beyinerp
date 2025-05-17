@extends('base')
@section('title', 'Contacts')

@section('content')
<style>
    .card.contact-card {
        max-width: 100%;
        border: none;
        background: white;
        border-radius: 1rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .table {
        margin-bottom: 0;
    }

    .table td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f1f3f4;
    }

    .table thead th {
        padding: 1rem 1.5rem;
        color: #5f6368;
        font-size: 0.875rem;
        border-bottom: 2px solid #e8eaed;
        background: #f8f9fa;
    }

    .contact-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .contact-icon-wrapper {
        position: relative;
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e8eaed;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .contact-checkbox {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: opacity 0.2s ease;
        z-index: 2;
        width: 20px;
        height: 20px;
    }

    .contact-icon-wrapper {
        position: relative;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e8eaed;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    tr:hover .contact-icon {
        visibility: hidden;
    }

    tr:hover .contact-checkbox {
        opacity: 1;
    }

    .contact-icon-wrapper:has(.contact-checkbox:checked) .contact-icon {
        visibility: hidden;
    }

    .contact-icon-wrapper:has(.contact-checkbox:checked) .contact-checkbox {
        opacity: 1;
    }

    .contact-details {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .contact-name {
        font-weight: 500;
        color: #202124;
    }

    .contact-email, .contact-tel {
        font-size: 0.875rem;
        color: #5f6368;
    }

    .badge {
        background: #e8eaed;
        color: #5f6368;
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
        border-radius: 1rem;
    }

    .icon-actions {
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .icon-actions i {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #5f6368;
        transition: all 0.2s ease;
    }

    .icon-actions i:hover {
        background: #f1f3f4;
        color: #202124;
    }

    tr:hover .icon-actions {
        opacity: 1;
    }

    .contact-icon-wrapper:has(.contact-checkbox:checked) .contact-icon {
        display: none;
    }
    
    .selection-header {
        background: #e8f0fe;
        color: #1a73e8;
        display: none;
    }
    
    .selection-header td {
        padding: 1rem 1.5rem;
        font-weight: 500;
    }
    
    .selection-header .delete-selected {
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        transition: all 0.2s ease;
    }
    
    .selection-header .delete-selected:hover {
        background: #d2e3fc;
    }
    /* Add these styles */
        tr {
            transition: background-color 0.2s ease;
        }
    
        tr:hover {
            background-color:rgb(225, 234, 245);
        }
    
        tr:hover .contact-name {
            color: #1a73e8;
        }
    
        tr:hover .contact-email,
        tr:hover .contact-tel {
            color: #202124;
        }
    
        tr:hover .badge {
            background: #e8f0fe;
            color: #1a73e8;
        }
    </style>

<div class="card contact-card p-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-2">
            <h5 class="mb-0 fw-normal">Contacts</h5>
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
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>
                            <div class="contact-info">
                                <label class="contact-icon-wrapper mb-0">
                                    <input type="checkbox" class="form-check-input contact-checkbox">
                                    <div class="contact-icon">
                                        <i class="bi bi-person-fill fs-4"></i>
                                    </div>
                                </label>
                                <span class="contact-name">{{ $contact->names }}</span>
                            </div>
                        </td>
                        <td class="contact-email">{{ $contact->email }}</td>
                        <td class="contact-tel">{{ $contact->tel }}</td>
                        <td>
                            <span class="badge">{{ $contact->libele }}</span>
                        </td>
                        <td>
                            <div class="icon-actions d-flex gap-1 justify-content-end">
                                <i class="bi bi-pencil" title="Modifier"></i>
                                <i class="bi bi-trash" title="Supprimer"></i>
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
    </script>
@endsection
