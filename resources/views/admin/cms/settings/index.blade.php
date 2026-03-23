@extends('admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Site Settings</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Configuration</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.cms.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $settings['site_name'] ?? 'Laikipia ECDE MIS' }}">
                        </div>

                        <div class="form-group">
                            <label for="site_description">Site Description</label>
                            <textarea name="site_description" id="site_description" class="form-control" rows="3">{{ $settings['site_description'] ?? '' }}</textarea>
                        </div>

                        <hr>
                        <h6 class="mb-3">Homepage Hero (First Section Visitors See)</h6>

                        <div class="form-group">
                            <label for="home_hero_headline">Hero Headline</label>
                            <input type="text" name="home_hero_headline" id="home_hero_headline" class="form-control" value="{{ $settings['home_hero_headline'] ?? '' }}" placeholder="Big headline on home hero">
                        </div>

                        <div class="form-group">
                            <label for="home_hero_subtext">Hero Subtext</label>
                            <textarea name="home_hero_subtext" id="home_hero_subtext" class="form-control" rows="3" placeholder="Short supporting text under headline">{{ $settings['home_hero_subtext'] ?? '' }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="home_hero_primary_cta_text">Primary CTA Text</label>
                                <input type="text" name="home_hero_primary_cta_text" id="home_hero_primary_cta_text" class="form-control" value="{{ $settings['home_hero_primary_cta_text'] ?? '' }}" placeholder="e.g. Read News">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="home_hero_primary_cta_link">Primary CTA Link</label>
                                <input type="text" name="home_hero_primary_cta_link" id="home_hero_primary_cta_link" class="form-control" value="{{ $settings['home_hero_primary_cta_link'] ?? '' }}" placeholder="e.g. /blog">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="home_hero_secondary_cta_text">Secondary CTA Text</label>
                                <input type="text" name="home_hero_secondary_cta_text" id="home_hero_secondary_cta_text" class="form-control" value="{{ $settings['home_hero_secondary_cta_text'] ?? '' }}" placeholder="e.g. Contact Us">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="home_hero_secondary_cta_link">Secondary CTA Link</label>
                                <input type="text" name="home_hero_secondary_cta_link" id="home_hero_secondary_cta_link" class="form-control" value="{{ $settings['home_hero_secondary_cta_link'] ?? '' }}" placeholder="e.g. /contact">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="home_hero_image">Hero Background Image</label>
                            @if($settings['home_hero_image'] ?? null)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $settings['home_hero_image']) }}" style="max-width: 220px; border-radius: 6px;">
                                </div>
                            @endif
                            <input type="file" name="home_hero_image" id="home_hero_image" class="form-control-file" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="contact_email">Contact Email</label>
                            <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="contact_phone">Contact Phone</label>
                            <input type="tel" name="contact_phone" id="contact_phone" class="form-control" value="{{ $settings['contact_phone'] ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="site_address">Site Address</label>
                            <textarea name="site_address" id="site_address" class="form-control" rows="2">{{ $settings['site_address'] ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="facebook_url">Facebook URL</label>
                            <input type="url" name="facebook_url" id="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="twitter_url">Twitter URL</label>
                            <input type="url" name="twitter_url" id="twitter_url" class="form-control" value="{{ $settings['twitter_url'] ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="instagram_url">Instagram URL</label>
                            <input type="url" name="instagram_url" id="instagram_url" class="form-control" value="{{ $settings['instagram_url'] ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="youtube_url">YouTube URL</label>
                            <input type="url" name="youtube_url" id="youtube_url" class="form-control" value="{{ $settings['youtube_url'] ?? ($settings['social_youtube'] ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="site_logo">Site Logo</label>
                            @if($settings['site_logo'] ?? null)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $settings['site_logo']) }}" style="max-width: 150px;">
                                </div>
                            @endif
                            <input type="file" name="site_logo" id="site_logo" class="form-control-file" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="items_per_page">Items Per Page</label>
                            <input type="number" name="items_per_page" id="items_per_page" class="form-control" value="{{ $settings['items_per_page'] ?? 10 }}" min="5" max="100">
                        </div>

                        <hr>
                        <h6 class="mb-3">Homepage Section Visibility</h6>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="show_home_hero" name="show_home_hero" value="1" {{ ($settings['show_home_hero'] ?? 1) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_home_hero">Show Hero Section</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="show_home_posts" name="show_home_posts" value="1" {{ ($settings['show_home_posts'] ?? 1) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_home_posts">Show Latest Posts Section</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="show_home_announcements" name="show_home_announcements" value="1" {{ ($settings['show_home_announcements'] ?? 1) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_home_announcements">Show Announcements Section</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="show_home_testimonials" name="show_home_testimonials" value="1" {{ ($settings['show_home_testimonials'] ?? 1) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_home_testimonials">Show Testimonials Section</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="show_home_explore" name="show_home_explore" value="1" {{ ($settings['show_home_explore'] ?? 1) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_home_explore">Show Explore Links Section</label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Current Logo</strong>
                </div>
                <div class="card-body text-center">
                    @if($settings['site_logo'] ?? null)
                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" style="max-width: 100%; max-height: 200px;">
                    @else
                        <p class="text-muted">No logo set</p>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <strong>Info</strong>
                </div>
                <div class="card-body">
                    <p><small>These settings are used throughout your website for branding, contact information, and default configurations.</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
