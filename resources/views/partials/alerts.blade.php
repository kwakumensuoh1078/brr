@if(session('success') || session('error') || session('info') || (isset($errors) && $errors->any()))
    <div class="system-alert-wrapper py-2" style="position: relative; z-index: 10; background: transparent;">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3" role="alert" style="border-radius: 8px; font-weight: 500; border-left: 5px solid #28a745; background-color: #f0fdf4; border-color: #bbf7d0; color: #166534;">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check-circle me-2" style="font-size: 18px;"></i>
                                <div>{{ session('success') }}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3" role="alert" style="border-radius: 8px; font-weight: 500; border-left: 5px solid #dc3545; background-color: #fef2f2; border-color: #fecaca; color: #991b1b;">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-exclamation-circle me-2" style="font-size: 18px;"></i>
                                <div>{{ session('error') }}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('info'))
                        <div class="alert alert-info alert-dismissible fade show shadow-sm mb-3" role="alert" style="border-radius: 8px; font-weight: 500; border-left: 5px solid #04b3f6; background-color: #f0f9ff; border-color: #bae6fd; color: #075985;">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-info-circle me-2" style="font-size: 18px;"></i>
                                <div>{{ session('info') }}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3" role="alert" style="border-radius: 8px; border-left: 5px solid #dc3545; background-color: #fef2f2; border-color: #fecaca; color: #991b1b;">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-exclamation-triangle me-2 mt-1" style="font-size: 18px;"></i>
                                <div>
                                    <strong class="d-block mb-1">Please check the following errors:</strong>
                                    <ul class="mb-0 ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
