<div class="card-body">
    <div class="bio-block">
        <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
            <h4 class="bio-block-title">{{ __('Browser Sessions') }}</h4>
            <a href="#" class="text-light small">{{ __('All Logout') }}</a>
        </div>
        <ul class="gap gy-3">
            @if (count($this->sessions) > 0)
            @foreach ($this->sessions as $session)
            <li>
                <div class="media-group">
                    <div class="media media-md flex-shrink-0 media-middle text-bg-secondary-soft">
                        @if ($session->agent->isDesktop())
                        <em class="icon ni ni-laptop"></em>
                        @else
                        <em class="icon ni ni-mobile"></em>
                        @endif
                    </div>
                    <div class="media-text">
                        <div class="lead-text">{{ $session->agent->platform() ? $session->agent->platform() :
                            __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() :
                            __('Unknown') }}</div>
                        <span class="sub-text">{{ $session->ip_address }}, @if ($session->is_current_device)<span
                                class="text-green-500 font-semibold">{{ __('This device') }}</span>@else {{ __('Last
                            active') }} {{ $session->last_active }} @endif</span>
                    </div>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
    </div><!-- .bio-block -->
</div>