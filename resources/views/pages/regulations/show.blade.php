@extends('layouts.app')

@section('title', $doc->title . ' - Ghana e-Registry')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Regulation Details" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">{{ Str::limit($doc->title, 45) }}</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('regulations.portal') }}">Regulations</a></li>
                            <li class="active">Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="regulation-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Regulation Main Overview -->
                <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-success fs-6">{{ $doc->consultationType?->name ?: 'Business Regulation' }}</span>
                        <span class="text-muted"><i class="fa fa-calendar me-1"></i> Year: {{ $doc->year ?: 'N/A' }}</span>
                    </div>

                    <h2 class="fw-bold fs-4 mb-3 text-dark">{{ $doc->title }}</h2>

                    @if($doc->no)
                        <div class="mb-3">
                            <span class="badge bg-light text-secondary border px-3 py-2 fs-6">
                                <i class="fa fa-tag me-1"></i> Official Number: {{ $doc->no }}
                            </span>
                        </div>
                    @endif

                    <div class="p-3 bg-light rounded mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <strong class="text-dark"><i class="fa fa-university text-success me-1"></i> Enforcing Agency:</strong>
                                <span class="text-muted d-block">{{ $doc->org?->org_name ?: 'Government of Ghana' }}</span>
                            </div>
                            <div class="col-md-6">
                                <strong class="text-dark"><i class="fa fa-book text-warning me-1"></i> Subject Area:</strong>
                                <span class="text-muted d-block">{{ $doc->subject?->name ?: 'General' }}</span>
                            </div>
                            <div class="col-md-6">
                                <strong class="text-dark"><i class="fa fa-industry text-primary me-1"></i> Economic Sector:</strong>
                                <span class="text-muted d-block">{{ $doc->interest?->interest_name ?: 'Cross-Sectoral' }}</span>
                            </div>
                            <div class="col-md-6">
                                <strong class="text-dark"><i class="fa fa-calendar-check-o text-danger me-1"></i> Gazette / Enactment Date:</strong>
                                <span class="text-muted d-block">{{ $doc->gazette_date ?: ($doc->year ?: 'N/A') }}</span>
                            </div>
                        </div>
                    </div>

                    @if($doc->document)
                        <div class="p-4 border rounded bg-light text-center mb-4">
                            <i class="fa fa-file-pdf-o text-danger fa-3x mb-2"></i>
                            <h5 class="fw-bold mb-1">Official Regulation Document</h5>
                            <p class="text-muted small mb-3">{{ basename($doc->document) }}</p>
                            <a href="{{ asset('upload/regulation_doc/' . $doc->document) }}" class="btn btn-success px-4" target="_blank" download>
                                <i class="fa fa-download me-1"></i> Download Official Law Document
                            </a>
                        </div>
                    @endif

                    <!-- Regulatory Clauses Section -->
                    @if($doc->clauses->isNotEmpty())
                        <div class="mt-4 pt-4 border-top">
                            <h4 class="fw-bold mb-3 text-dark">
                                <i class="fa fa-list-ol text-success me-2"></i> Regulatory Provisions & Clauses ({{ $doc->clauses->count() }})
                            </h4>
                            <div class="accordion" id="clausesAccordion">
                                @foreach($doc->clauses as $index => $clause)
                                    <div class="accordion-item mb-2 border">
                                        <h2 class="accordion-header" id="heading{{ $clause->id }}">
                                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $clause->id }}">
                                                <strong>Section {{ $clause->section ?: ($index + 1) }}:</strong> &nbsp; {{ $clause->clause_title ?: 'Regulatory Provision' }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $clause->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#clausesAccordion">
                                            <div class="accordion-body text-muted" style="line-height: 1.8;">
                                                {!! nl2br(e($clause->details)) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Operational Procedures Section -->
                    @if($doc->procedures->isNotEmpty())
                        <div class="mt-4 pt-4 border-top">
                            <h4 class="fw-bold mb-3 text-dark">
                                <i class="fa fa-cogs text-primary me-2"></i> Operational Procedures & Compliance Requirements
                            </h4>
                            <div class="list-group">
                                @foreach($doc->procedures as $proc)
                                    <div class="list-group-item p-3 mb-2 border rounded">
                                        <div class="fw-semibold text-dark mb-1">{{ $proc->procedure_text }}</div>
                                        @if($proc->fees)
                                            <small class="badge bg-warning-subtle text-dark border border-warning">
                                                <i class="fa fa-money me-1"></i> Statutory Fees: {{ $proc->fees }}
                                            </small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Regulatory Forms Section -->
                    @if($doc->forms->isNotEmpty())
                        <div class="mt-4 pt-4 border-top">
                            <h4 class="fw-bold mb-3 text-dark">
                                <i class="fa fa-file-text-o text-danger me-2"></i> Prescribed Application Forms
                            </h4>
                            <div class="list-group">
                                @foreach($doc->forms as $form)
                                    <div class="list-group-item d-flex justify-content-between align-items-center p-3 mb-2 border rounded">
                                        <div>
                                            <span class="fw-semibold text-dark">{{ $form->title }}</span>
                                            @if($form->form_no)
                                                <small class="badge bg-light text-secondary border ms-2">Form {{ $form->form_no }}</small>
                                            @endif
                                        </div>
                                        @if($form->document)
                                            <a href="{{ asset('upload/forms/' . $form->document) }}" class="btn btn-sm btn-outline-danger" target="_blank" download>
                                                <i class="fa fa-download me-1"></i> Download Form
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 bg-light mb-4">
                    <h5 class="fw-bold mb-3">Related Regulations</h5>
                    <div class="d-flex flex-column gap-3">
                        @foreach($relatedDocs as $rel)
                            <div class="border-bottom pb-2">
                                <h6 class="fw-semibold mb-1">
                                    <a href="{{ route('regulations.show', $rel->id) }}" class="text-dark">
                                        {{ Str::limit($rel->title, 55) }}
                                    </a>
                                </h6>
                                <small class="text-muted"><i class="fa fa-calendar me-1"></i> {{ $rel->year ?: 'N/A' }} | {{ $rel->consultationType?->name }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4 bg-white">
                    <h5 class="fw-bold mb-3"><i class="fa fa-search text-success me-2"></i> Search e-Registry</h5>
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search keywords..." required>
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
