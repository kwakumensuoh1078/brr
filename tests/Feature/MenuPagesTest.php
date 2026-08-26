<?php

namespace Tests\Feature;

use Tests\TestCase;

class MenuPagesTest extends TestCase
{
    public function test_bready_overview_renders()
    {
        $response = $this->get(route('bready.overview'));
        $response->assertStatus(200);
        $response->assertSee('The B-Ready Programme');
        $response->assertDontSee('Contact</a></li>', false);
    }

    public function test_bready_ghana_renders()
    {
        $response = $this->get(route('bready.ghana'));
        $response->assertStatus(200);
        $response->assertSee("Ghana", false);
        $response->assertSee("2024 Over-all Score", false);
    }

    public function test_bready_performance_data_renders()
    {
        $response = $this->get(route('bready.performance_data'));
        $response->assertStatus(200);
        $response->assertSee('Performance Data', false);
        $response->assertSee("Ghana's Outlook", false);
    }

    public function test_rolling_review_overview_renders()
    {
        $response = $this->get(route('rolling_review.overview'));
        $response->assertStatus(200);
        $response->assertSee('Rolling Review of Business Regulations', false);
    }

    public function test_reform_tracker_renders()
    {
        $response = $this->get(route('rolling_review.tracker'));
        $response->assertStatus(200);
        $response->assertSee('Reform Monitoring & Tracking System', false);
    }

    public function test_about_brr_renders()
    {
        $response = $this->get(route('about'));
        $response->assertStatus(200);
        $response->assertSee('The BRR Programme');
        $response->assertSee('Hannah M. Affum');
    }

    public function test_faq_renders()
    {
        $response = $this->get(route('faq'));
        $response->assertStatus(200);
        $response->assertSee('Frequently Asked Questions');
    }

    public function test_your_say_renders()
    {
        $response = $this->get(route('your_say'));
        $response->assertStatus(200);
        $response->assertSee('Have your say');
    }

    public function test_stakeholders_renders()
    {
        $response = $this->get(route('stakeholders'));
        $response->assertStatus(200);
        $response->assertSee('Stakeholders');
    }

    public function test_privacy_statement_renders()
    {
        $response = $this->get(route('privacy'));
        $response->assertStatus(200);
        $response->assertSee('Privacy Statement');
    }

    public function test_terms_of_use_renders()
    {
        $response = $this->get(route('terms'));
        $response->assertStatus(200);
        $response->assertSee('Acceptance of Terms of Use');
    }

    public function test_publications_renders()
    {
        $response = $this->get(route('publications'));
        $response->assertStatus(200);
        $response->assertSee('Publications');
    }

    public function test_contact_modal_and_popups_render()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('contact-modal-popup');
        $response->assertSee('search-popup');
        $response->assertSee('crt_mobile_menu');
    }
}
