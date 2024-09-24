    <tr>
        <div class="table-responsive">
            <style>
                td.sticky {
                    position: sticky;
                    left: 0;
                    background-color: #ffffff;
                }
            </style>
            @php
                $itemArray = json_decode($user->item, true);
                $etaArray = json_decode($user->etauser, true);
                $specsArray = json_decode($user->specs, true);
                $sizeArray = json_decode($user->size, true);
                $qtyArray = json_decode($user->qty, true);
                $kosong3Array = json_decode($user->kosong3, true);
                // Mengambil item pertama dari masing-masing kolom
                $firstItem = reset($itemArray);
                $firstSpecs = reset($specsArray);
                $firstSize = reset($sizeArray);
                $firstQty = reset($qtyArray);
                $firstUnit = reset($kosong3Array);
                $firstEtauser = reset($etaArray);
            @endphp

            <td style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                00{{ $user->id }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                @if ($user->status == 'Approve')
                    <span class="material-symbols-outlined text-success" style='font-size:18px'>
                        check_circle
                    </span>
                @elseif ($user->status == 'Waiting List')
                    <span class="material-symbols-outlined text-primary" style='font-size:18px'>
                        hourglass_top
                    </span>
                @elseif ($user->status == 'Waiting')
                    <span class="material-symbols-outlined text-warning" style='font-size:18px'>
                        error
                    </span>
                @elseif ($user->status == 'Declined')
                    <span class="material-symbols-outlined text-danger" style='font-size:18px'>
                        cancel
                    </span>
                @else
                @endif
            </td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                @if ($user->dept == 'FA & TAX')
                    <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                        payments
                    </span> {{ $user->created }}
                @elseif ($user->dept == 'HRGA')
                    <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                        group
                    </span> {{ $user->created }}
                @elseif ($user->dept == 'Prodev')
                    <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                        Inventory
                    </span> {{ $user->created }}
                @elseif ($user->dept == 'Produksi')
                    <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                        Factory
                    </span> {{ $user->created }}
                @elseif ($user->dept == 'PPIC SM')
                    <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                        support
                    </span> {{ $user->created }}
                @elseif ($user->dept == 'PPIC RM')
                    <span class="material-symbols-outlined text-dark align-middle" style='font-size:18px'>
                        quick_reference
                    </span> {{ $user->created }}
                @else
                @endif


            </td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ \Carbon\Carbon::parse($firstEtauser)->format('j M y') }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $firstItem }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $firstSpecs }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $firstSize }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $firstQty }} &nbsp; {{ $firstUnit }}</td>

            <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                <div class="dropdown">
                    <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Manage
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Detail</a></li>
                        <li><a class="dropdown-item" href="#">Approve</a></li>
                    </ul>
                </div>
            </td>

    </tr>
