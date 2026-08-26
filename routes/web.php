<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\BusinessRegulationController;
use App\Http\Controllers\BReadyController;
use App\Http\Controllers\RollingReviewController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index']);
Route::get('/index.php', [HomeController::class, 'index']);

// Public Consultations
Route::prefix('consultations')->name('consultations.')->group(function () {
    Route::get('/', [ConsultationController::class, 'current'])->name('index');
    Route::get('/current', [ConsultationController::class, 'current'])->name('current');
    Route::get('/closed', [ConsultationController::class, 'closed'])->name('closed');
    Route::get('/calendar', [ConsultationController::class, 'calendar'])->name('calendar');
    Route::get('/discussions', [ConsultationController::class, 'discussions'])->name('discussions');
    Route::get('/polls', [ConsultationController::class, 'polls'])->name('polls');
    Route::post('/polls/{id}/vote', [ConsultationController::class, 'votePoll'])->middleware('throttle:10,1')->name('vote_poll');
    Route::get('/{id}', [ConsultationController::class, 'show'])->name('show');
    Route::post('/{id}/feedback', [ConsultationController::class, 'submitFeedback'])->middleware('throttle:10,1')->name('submit_feedback');
});

// Legacy aliases for Consultations
Route::get('/cur_consult', [ConsultationController::class, 'current']);
Route::get('/cur_consult.php', [ConsultationController::class, 'current']);
Route::get('/closed_consult', [ConsultationController::class, 'closed']);
Route::get('/closed_consult.php', [ConsultationController::class, 'closed']);
Route::get('/consult_cal', [ConsultationController::class, 'calendar']);
Route::get('/consult_cal.php', [ConsultationController::class, 'calendar']);
Route::get('/discussions', [ConsultationController::class, 'discussions']);
Route::get('/discussions.php', [ConsultationController::class, 'discussions']);
Route::get('/polls', [ConsultationController::class, 'polls']);
Route::get('/polls.php', [ConsultationController::class, 'polls']);
Route::get('/consultation', [ConsultationController::class, 'current']);
Route::get('/consultation.php', [ConsultationController::class, 'current']);
Route::get('/upcomin-consultation', [ConsultationController::class, 'current']);
Route::get('/upcomin-consultation.php', [ConsultationController::class, 'current']);

// Business Regulations (e-Registry)
Route::prefix('regulations')->name('regulations.')->group(function () {
    Route::get('/', [BusinessRegulationController::class, 'portal'])->name('portal');
    Route::get('/portal', [BusinessRegulationController::class, 'portal'])->name('portal_view');
    Route::get('/by-institution', [BusinessRegulationController::class, 'byInstitution'])->name('by_institution');
    Route::get('/by-sector', [BusinessRegulationController::class, 'bySector'])->name('by_sector');
    Route::get('/by-subject', [BusinessRegulationController::class, 'bySubject'])->name('by_subject');
    Route::get('/by-year', [BusinessRegulationController::class, 'byYear'])->name('by_year');
    Route::get('/institution/{id}', [BusinessRegulationController::class, 'institutionDetails'])->name('institution_details');
    Route::get('/{id}', [BusinessRegulationController::class, 'show'])->name('show');
});

// Legacy aliases for Regulations
Route::get('/portal', [BusinessRegulationController::class, 'portal']);
Route::get('/portal.php', [BusinessRegulationController::class, 'portal']);
Route::get('/institution', [BusinessRegulationController::class, 'byInstitution']);
Route::get('/institution.php', [BusinessRegulationController::class, 'byInstitution']);
Route::get('/sector', [BusinessRegulationController::class, 'bySector']);
Route::get('/sector.php', [BusinessRegulationController::class, 'bySector']);
Route::get('/subject', [BusinessRegulationController::class, 'bySubject']);
Route::get('/subject.php', [BusinessRegulationController::class, 'bySubject']);
Route::get('/year', [BusinessRegulationController::class, 'byYear']);
Route::get('/year.php', [BusinessRegulationController::class, 'byYear']);
Route::get('/business_reg', [BusinessRegulationController::class, 'bySubject']);
Route::get('/business_reg.php', [BusinessRegulationController::class, 'bySubject']);
Route::get('/reg_details', function (\Illuminate\Http\Request $request) {
    if ($request->has('id')) {
        return redirect()->route('regulations.show', ['id' => $request->get('id')]);
    }
    return redirect()->route('regulations.portal');
});
Route::get('/reg_details.php', function (\Illuminate\Http\Request $request) {
    if ($request->has('id')) {
        return redirect()->route('regulations.show', ['id' => $request->get('id')]);
    }
    return redirect()->route('regulations.portal');
});

// B-Ready Ghana
Route::prefix('b-ready')->name('bready.')->group(function () {
    Route::get('/', [BReadyController::class, 'overview'])->name('overview');
    Route::get('/overview', [BReadyController::class, 'overview'])->name('overview_view');
    Route::get('/ghana', [BReadyController::class, 'ghana'])->name('ghana');
    Route::get('/performance-data', [BReadyController::class, 'performanceData'])->name('performance_data');
    Route::get('/topic/{id}', [BReadyController::class, 'topic'])->name('topic');
});

// Legacy aliases for B-Ready
Route::get('/b_ready', [BReadyController::class, 'overview']);
Route::get('/b_ready.php', [BReadyController::class, 'overview']);
Route::get('/b-ready.php', [BReadyController::class, 'overview']);
Route::get('/b-readyghana', [BReadyController::class, 'ghana']);
Route::get('/b-readyghana.php', [BReadyController::class, 'ghana']);
Route::get('/performance-data', [BReadyController::class, 'performanceData']);
Route::get('/performance-data.php', [BReadyController::class, 'performanceData']);
Route::get('/b-readytopic', function (\Illuminate\Http\Request $request) {
    $id = $request->get('id', 1);
    return redirect()->route('bready.topic', ['id' => $id]);
});
Route::get('/b-readytopic.php', function (\Illuminate\Http\Request $request) {
    $id = $request->get('id', 1);
    return redirect()->route('bready.topic', ['id' => $id]);
});
Route::get('/b-Reforms', [RollingReviewController::class, 'overview']);
Route::get('/b-Reforms.php', [RollingReviewController::class, 'overview']);

// Rolling Review
Route::prefix('rolling-review')->name('rolling_review.')->group(function () {
    Route::get('/', [RollingReviewController::class, 'overview'])->name('overview');
    Route::get('/overview', [RollingReviewController::class, 'overview'])->name('overview_view');
    Route::get('/tracker', [RollingReviewController::class, 'tracker'])->name('tracker');
});

// Legacy aliases for Rolling Review
Route::get('/roll-review', [RollingReviewController::class, 'overview']);
Route::get('/roll-review.php', [RollingReviewController::class, 'overview']);
Route::get('/ref_tracker', [RollingReviewController::class, 'tracker']);
Route::get('/ref_tracker.php', [RollingReviewController::class, 'tracker']);

// Information & Public Engagement
Route::get('/about', [InformationController::class, 'about'])->name('about');
Route::get('/aboutbrr', [InformationController::class, 'about'])->name('aboutbrr');
Route::get('/aboutbrr.php', [InformationController::class, 'about']);
Route::get('/faq', [InformationController::class, 'faq'])->name('faq');
Route::get('/faq.php', [InformationController::class, 'faq']);
Route::get('/your_say', [InformationController::class, 'yourSay'])->name('your_say');
Route::get('/your_say.php', [InformationController::class, 'yourSay']);
Route::post('/your_say/submit', [InformationController::class, 'submitYourSay'])->middleware('throttle:10,1')->name('your_say.submit');
Route::get('/stakeholders', [InformationController::class, 'stakeholders'])->name('stakeholders');
Route::get('/stakeholders.php', [InformationController::class, 'stakeholders']);
Route::get('/privacy', [InformationController::class, 'privacy'])->name('privacy');
Route::get('/privacy.php', [InformationController::class, 'privacy']);
Route::get('/terms', [InformationController::class, 'terms'])->name('terms');
Route::get('/terms.php', [InformationController::class, 'terms']);
Route::get('/publications', [InformationController::class, 'publications'])->name('publications');
Route::get('/publications.php', [InformationController::class, 'publications']);

// Contact & Grievances
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contact.php', [ContactController::class, 'index']);
Route::post('/contact/submit', [ContactController::class, 'submitContact'])->middleware('throttle:10,1')->name('contact.submit');
Route::post('/propose/submit', [ContactController::class, 'submitProposal'])->middleware('throttle:10,1')->name('propose.submit');
Route::post('/complaint/submit', [ContactController::class, 'submitComplaint'])->middleware('throttle:10,1')->name('complaint.submit');

// Global Search
Route::get('/search', [SearchController::class, 'search'])->middleware('throttle:30,1')->name('search');
Route::get('/search_result', [SearchController::class, 'search'])->middleware('throttle:30,1')->name('search_result');
Route::get('/search_result.php', [SearchController::class, 'search'])->middleware('throttle:30,1');
Route::get('/search_detail', [SearchController::class, 'search']);
Route::get('/search_detail.php', [SearchController::class, 'search']);

// Authentication (Throttled 5 attempts/min for brute force security)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login.php', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/register.php', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register.submit');
Route::get('/password_reset', [AuthController::class, 'showResetPassword'])->name('password_reset');
Route::get('/password_reset.php', [AuthController::class, 'showResetPassword']);
Route::get('/otp_reset', [AuthController::class, 'showResetPassword'])->name('otp_reset');
Route::get('/otp_reset.php', [AuthController::class, 'showResetPassword']);
Route::post('/password_reset/send_otp', [AuthController::class, 'sendResetOtp'])->middleware('throttle:5,1')->name('password_reset.send_otp');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');
Route::get('/logout.php', [AuthController::class, 'logout']);
