<?php $auth=auth()->user(); ?>

@if($auth)
    @extends('admin.app')
    @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard</h1>
                <p>Welcome {{ $auth->name }}!</p>
            </div>
        </div>
    </div>
    @endsection
@else
    @extends('front.app')
    @section('content')
    <style>
        .hero-section {
            background: linear-gradient(135deg, #1a3c5e 0%, #2d5f8d 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            opacity: 0.95;
        }
        .btn-hero {
            background: white;
            color: #1a3c5e;
            padding: 12px 30px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .feature-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            text-align: center;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .feature-card i {
            font-size: 3rem;
            color: #1a3c5e;
            margin-bottom: 15px;
        }
        .feature-card h4 {
            color: #1a3c5e;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section-title {
            color: #1a3c5e;
            font-size: 2rem;
            font-weight: bold;
            margin: 60px 0 40px;
            text-align: center;
        }
        .post-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-bottom: 30px;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        .post-card h5 {
            color: #1a3c5e;
            padding: 20px 20px 10px;
            margin: 0;
        }
        .post-card p {
            padding: 0 20px 10px;
            color: #666;
            font-size: 0.95rem;
        }
        .post-card a {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 20px;
            background: #1a3c5e;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .post-card a:hover {
            background: #0f2438;
        }
        .cta-section {
            background: #1a3c5e;
            color: white;
            padding: 60px 0;
            text-align: center;
            border-radius: 8px;
            margin: 60px 0;
        }
        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .cta-section p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        .stats-container {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
            flex-wrap: wrap;
        }
        .stat-box {
            text-align: center;
            padding: 20px;
            flex: 1;
            min-width: 200px;
        }
        .stat-box h3 {
            color: #1a3c5e;
            font-size: 2.5rem;
            font-weight: bold;
        }
        .stat-box p {
            color: #666;
            font-size: 1rem;
        }
    </style>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Laikipia County Development Fund</h1>
        <p>Empowering Communities Through Education and Development</p>
        <a href="/blog" class="btn-hero"><i class="fa fa-newspaper-o"></i> Read Our News</a>
        <a href="/contact" class="btn-hero"><i class="fa fa-envelope"></i> Get in Touch</a>
    </div>

    <!-- Main Content -->
    <div class="container" style="padding: 40px 0;">
        
        <!-- Features Section -->
        <div class="section-title">What We Offer</div>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <i class="fa fa-graduation-cap"></i>
                    <h4>Bursary Schemes</h4>
                    <p>Support for deserving students through various bursary programs designed to make education accessible to all.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <i class="fa fa-building"></i>
                    <h4>Community Projects</h4>
                    <p>Infrastructure development and community initiatives aimed at improving the quality of life in Laikipia County.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <i class="fa fa-users"></i>
                    <h4>Community Support</h4>
                    <p>Dedicated support services and resources to help our communities thrive and grow sustainably.</p>
                </div>
            </div>
        </div>

        <!-- Recent Blog Posts -->
        @if($recentPosts ?? false)
        <div class="section-title">Latest News & Updates</div>
        <div class="row">
            @foreach($recentPosts as $post)
            <div class="col-md-4">
                <div class="post-card">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    <a href="/blog/{{ $post->slug }}">Read More →</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Call to Action -->
        <div class="cta-section">
            <h2>Ready to Apply?</h2>
            <p>Start your bursary application or check the status of your existing application.</p>
            <a href="/" class="btn-hero"><i class="fa fa-pencil"></i> Apply Now</a>
            <a href="/bursary-status-query" class="btn-hero"><i class="fa fa-search"></i> Check Status</a>
        </div>

        <!-- Quick Links -->
        <div class="section-title">Explore</div>
        <div class="row">
            <div class="col-md-3 text-center">
                <a href="/blog" style="text-decoration: none;">
                    <div class="feature-card">
                        <i class="fa fa-blog"></i>
                        <h4>Blog</h4>
                        <p>Read articles and updates from Laikipia County</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a href="/galleries" style="text-decoration: none;">
                    <div class="feature-card">
                        <i class="fa fa-image"></i>
                        <h4>Galleries</h4>
                        <p>View photos from our community events</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a href="/faqs" style="text-decoration: none;">
                    <div class="feature-card">
                        <i class="fa fa-question-circle"></i>
                        <h4>FAQs</h4>
                        <p>Find answers to common questions</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a href="/contact" style="text-decoration: none;">
                    <div class="feature-card">
                        <i class="fa fa-phone"></i>
                        <h4>Contact</h4>
                        <p>Get in touch with us today</p>
                    </div>
                </a>
            </div>
        </div>

    </div>

    @endsection
@endif
