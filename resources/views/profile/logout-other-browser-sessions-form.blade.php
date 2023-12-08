
<div class="card-body">
    <div class="bio-block">
        <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
            <h4 class="bio-block-title">Browser Sessions</h4>
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
        <!-- <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center gap g-3">
                <div class="gap-col">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logoutBrowserSession">
                        {{ __('Log Out Other Browser Sessions') }}
                    </button>
                </div>
            </div>
        </div> -->
    </div><!-- .bio-block -->
</div>

<!-- Modal -->
<div class="modal fade" id="logoutBrowserSession" tabindex="-1" aria-labelledby="logoutBrowserSession"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="logoutBrowserSession">Log out from other session</h4>
                <h6>Please enter your password to continue</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form mwire:submit.prevent="logoutOtherBrowserSessions">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <div x-data="{}"
                                        x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                                        <input autocomplete="current-password" placeholder="{{ __('Password') }}"
                                            x-ref="password" wire:model.defer="password"
                                            wire:keydown.enter="logoutOtherBrowserSessions">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- .modal -->