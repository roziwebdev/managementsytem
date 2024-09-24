    <tr>
        <div class="table-responsive">
            <style>
                td.sticky {
                    position: sticky;
                    left: 0;
                    background-color: #ffffff;
                }
            </style>


            <td style="padding-top: 3px; padding-bottom:3px;" class="sticky">
                {{ $user->id }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $user->item }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $user->type }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $user->price }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $user->specs }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $user->size }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $user->unit }}</td>
            <td style="padding-top: 3px; padding-bottom:3px;" class="">
                {{ $user->created_at }}</td>


            <td style="padding-top: 3px; padding-bottom:3px;" class="d-flex ">
                <div class="dropdown">
                    <a class="btn btn-sm btn-gradient-info dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Detail</a></li>
                        <li><a class="dropdown-item" href="#">Approve</a></li>
                    </ul>
                </div>
            </td>

    </tr>
