    @php
        $initials = '';
        $nameParts = explode(' ', Auth::user()->name);
        foreach ($nameParts as $part) {
            $initials .= strtoupper(substr($part, 0, 1));
        }
    @endphp
    <div class="user-photo" style="border-radius: 50%; background-color: #f1f1f1; width: 50px; height: 50px; text-align: center; line-height: 50px; font-size: 20px;">
        {{ $initials }}
    </div>
