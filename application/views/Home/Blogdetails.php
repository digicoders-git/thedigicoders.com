<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $userdata->title ?> | DigiCoders Blog</title>
    <meta name="description" content="<?= $userdata->meta_description ?>">

    <meta property="og:title" content="<?= $userdata->title ?> | DigiCoders Blog" />
    <meta property="og:description" content="<?= $userdata->meta_description ?>" />

    <!-- Google BlogPosting Schema Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "<?= htmlspecialchars($userdata->title) ?>",
        "description": "<?= htmlspecialchars($userdata->meta_description) ?>",
        "image": "<?= base_url('public/uploads/blog/' . $userdata->img) ?>",
        "author": {
            "@type": "Organization",
            "name": "DigiCoders Technologies Pvt. Ltd."
        },
        "publisher": {
            "@type": "Organization",
            "name": "DigiCoders Technologies Pvt. Ltd.",
            "logo": {
                "@type": "ImageObject",
                "url": "<?= base_url('public/assets/images/logo.png') ?>"
            }
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?= base_url($this->uri->uri_string()) ?>"
        }
    }
    </script>

    <?php include('include/headerlinks.php') ?>

    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --dark: #111;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
            color: #000;
            letter-spacing: -0.5px;
        }

        /* Hero Banner */
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%);
            z-index: 1;
        }

        .page-banner h1 {
            font-size: 2.8rem;
            font-weight: 600;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .lead-text {
            font-size: 1.25rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Blog Details Styling */
        .blog-content-area {
            padding: 50px 0;
        }

        .blog-main-img {
            width: 100%;
            border-radius: 0px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .blog-title {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: var(--blue);
        }

        .blog-subtitle {
            font-size: 1.3rem;
            color: #555;
            margin-bottom: 25px;
            font-weight: 500;
            border-left: 4px solid var(--orange);
            padding-left: 15px;
        }

        .blog-text {
            font-size: 1.1rem;
            color: #333;
            text-align: justify;
        }

        .blog-text ul,
        .blog-text ol {
            padding-left: 25px !important;
            list-style-position: outside;
        }

        .blog-text li {
            color: #444;
        }

        .blog-text img {
            max-width: 100%;
            height: auto !important;
            border-radius: 0px;
            margin: 20px 0;
            display: block;
        }

        /* Sidebar Styling */
        .sidebar-sticky {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget {
            background: #fff;
            padding: 25px;
            border-radius: 0px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border: 1px solid #f0f0f0;
        }

        .widget-title {
            font-size: 1.4rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--orange);
            display: inline-block;
        }

        .recent-blog-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f5f5f5;
            transition: var(--transition);
        }

        .recent-blog-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .recent-blog-item:hover {
            transform: translateX(5px);
        }

        .recent-blog-img {
            width: 80px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .recent-blog-info h6 {
            font-size: 0.95rem;
            margin: 0 0 5px 0;
            line-height: 1.3;
        }

        .recent-blog-info h6 a {
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .recent-blog-info h6 a:hover {
            color: var(--blue);
        }

        .recent-blog-date {
            font-size: 0.8rem;
            color: #888;
        }

        /* Table of Contents Widget Styling */
        .toc-list li {
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .toc-list a {
            color: #555;
            text-decoration: none;
            font-size: 0.95rem;
            transition: var(--transition);
            display: block;
            padding-left: 10px;
            border-left: 2px solid transparent;
        }

        .toc-list a:hover {
            color: var(--blue);
        }

        .toc-list a.active {
            color: var(--blue);
            font-weight: 600;
            padding-left: 12px;
        }

        .toc-list .toc-h1 {
            padding-left: 5px;
            font-weight: 600;
        }

        .toc-list .toc-h2 {
            padding-left: 15px;
        }

        .toc-list .toc-h3 {
            padding-left: 25px;
            font-size: 0.9rem;
        }

        .toc-list .toc-h4 {
            padding-left: 35px;
            font-size: 0.85rem;
        }

        .toc-list .toc-h5 {
            padding-left: 45px;
            font-size: 0.8rem;
        }

        .toc-list .toc-h6 {
            padding-left: 55px;
            font-size: 0.75rem;
        }

        @media (max-width: 991px) {
            .blog-title {
                font-size: 1.8rem;
            }

            .sidebar-sticky {
                position: static;
                margin-top: 40px;
            }
        }

        /* Blog FAQ Accordion Styling */
        .accordion-button:not(.collapsed) .faq-chevron-icon {
            transform: rotate(90deg);
            color: var(--blue);
        }
        .accordion-button:not(.collapsed) {
            color: var(--blue) !important;
        }
        .accordion-item {
            border: none;
        }
        .accordion-button::after {
            display: none !important; /* Hide default Bootstrap chevron */
        }
        .transition {
            transition: var(--transition);
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Premium Hero Banner ==== -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white">Blog Insights</h1>
                    <p class="text-white mt-3 lead-text">Latest news and technical updates from DigiCoders</p>
                </div>
            </div>
        </div>

        <div class="blog-content-area">
            <div class="container">
                <div class="row">
                    <!-- Left: Main Blog Content -->
                    <div class="col-lg-8">
                        <div class="blog-details-inner">
                            <h2 class="blog-title"><?= $userdata->title ?></h2>
                            <div class="blog-subtitle"><?= $userdata->meta_description ?></div>

                            <img loading="lazy" class="lazy blog-main-img"
                                src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                data-src="<?= base_url('public/uploads/blog/' . $userdata->img) ?>"
                                alt="<?= $userdata->title ?>" />

                            <div class="blog-text">
                                <?= $userdata->content ?>
                            </div>

                            <!-- FAQ Section -->
                            <?php 
                            $faqs = array();
                            if (!empty($userdata->faqs)) {
                                $faqs = json_decode($userdata->faqs, true);
                            }
                            if (!empty($faqs)): 
                            ?>
                                <div class="blog-faqs-section mt-5 border-top pt-4">
                                    <h3 class="mb-4" style="color: var(--blue);">Frequently Asked Questions</h3>
                                    <div class="accordion" id="blogFaqAccordion">
                                        <?php foreach ($faqs as $i => $faq): ?>
                                            <div class="accordion-item border-bottom py-3">
                                                <h5 class="accordion-header mb-0" id="faqHeading<?= $i ?>">
                                                    <button class="accordion-button collapsed btn text-start w-100 p-0 d-flex justify-content-between align-items-center" 
                                                            type="button" 
                                                            data-toggle="collapse" 
                                                            data-target="#faqCollapse<?= $i ?>" 
                                                            aria-expanded="false" 
                                                            aria-controls="faqCollapse<?= $i ?>"
                                                            style="box-shadow: none; font-size: 1.1rem; color: #222; background: transparent; border: none; font-weight: normal;">
                                                        <span><strong style="font-weight: 600;">Q <?= $i + 1 ?>.</strong> <?= htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8') ?></span>
                                                        <i class="fa fa-chevron-down faq-chevron-icon transition" style="font-size: 0.9rem;"></i>
                                                    </button>
                                                </h5>
                                                <div id="faqCollapse<?= $i ?>" 
                                                     class="accordion-collapse collapse" 
                                                     aria-labelledby="faqHeading<?= $i ?>" 
                                                     data-parent="#blogFaqAccordion">
                                                    <div class="accordion-body mt-2 text-muted" style="font-size: 1rem; line-height: 1.6;">
                                                        <strong style="font-weight: 600; color: #222;">Ans.</strong> <?= nl2br(htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8')) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Right: Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar-sticky">
                            <div class="sidebar-widget">
                                <!-- Table of Contents Widget -->
                                <div class="toc-widget" style="margin-bottom: 25px;">
                                    <h4 class="widget-title">Table of Contents</h4>
                                    <ul id="blog-toc" class="toc-list"
                                        style="list-style: none; padding-left: 0; margin-bottom: 0;">
                                        <!-- Headings will be dynamically generated here -->
                                    </ul>
                                    <hr style="margin: 25px 0 0 0; border-color: #eee;">
                                </div>

                                <h4 class="widget-title">Recent Posts</h4>
                                <div class="recent-blogs-list">
                                    <?php if (!empty($recent_blogs)): ?>
                                        <?php foreach ($recent_blogs as $rb): ?>
                                            <div class="recent-blog-item">
                                                <img loading="lazy" src="<?= base_url('public/uploads/blog/' . $rb->img) ?>"
                                                    alt="blog" class="recent-blog-img">
                                                <div class="recent-blog-info">
                                                    <h6><a
                                                            href="<?= base_url('blog-details/' . (!empty($rb->url) ? $rb->url : $rb->id)) ?>"><?= $rb->title ?></a>
                                                    </h6>
                                                    <span class="recent-blog-date">DigiCoders Insights</span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No other posts found.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- CTA Widget -->
                            <div class="sidebar-widget bg-light"
                                style="background: linear-gradient(135deg, var(--blue) 0%, #004a75 100%); color: #fff;">
                                <h4 class="widget-title text-white" style="border-bottom-color: #fff;">Need Training?
                                </h4>
                                <p style="color: rgba(255,255,255,0.9); font-size: 0.95rem;">Start your professional
                                    journey with DigiCoders Technologies today.</p>
                                <a href="<?= base_url() ?>Home/Registration" class="btn btn-warning w-100 mt-3"
                                    style="background: var(--orange); border: none; color: #fff; font-weight: 700;">REGISTER
                                    NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
    </div>
    <!-- Content END-->
    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const blogText = document.querySelector('.blog-text');
            const tocList = document.getElementById('blog-toc');

            if (blogText && tocList) {
                // Find h1, h2, h3, h4, h5, h6 headings in the blog content
                const headings = blogText.querySelectorAll('h1, h2, h3, h4, h5, h6');

                if (headings.length > 0) {
                    headings.forEach((heading, index) => {
                        // Create a unique ID if not present
                        const headingId = heading.id || 'blog-heading-' + index;
                        heading.id = headingId;

                        // Add smooth scrolling margin top offset
                        heading.style.scrollMarginTop = '100px';

                        // Create TOC item
                        const li = document.createElement('li');
                        li.className = 'toc-item toc-' + heading.tagName.toLowerCase();

                        const a = document.createElement('a');
                        a.href = '#' + headingId;
                        a.textContent = heading.textContent.trim();

                        // Smooth scroll on click
                        a.addEventListener('click', function (e) {
                            e.preventDefault();
                            heading.scrollIntoView({
                                behavior: 'smooth'
                            });
                            // Update active state in URL (without reload)
                            history.pushState(null, null, '#' + headingId);

                            // Update active class manually
                            document.querySelectorAll('#blog-toc a').forEach(link => link.classList.remove('active'));
                            a.classList.add('active');
                        });

                        li.appendChild(a);
                        tocList.appendChild(li);
                    });

                    // Highlight active heading on scroll
                    const observerOptions = {
                        root: null,
                        rootMargin: '-100px 0px -75% 0px',
                        threshold: 0
                    };

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const activeId = entry.target.id;
                                document.querySelectorAll('#blog-toc a').forEach(link => {
                                    if (link.getAttribute('href') === '#' + activeId) {
                                        link.classList.add('active');
                                    } else {
                                        link.classList.remove('active');
                                    }
                                });
                            }
                        });
                    }, observerOptions);

                    headings.forEach(heading => observer.observe(heading));

                } else {
                    // Hide TOC widget if no headings are present
                    const tocWidget = document.querySelector('.toc-widget');
                    if (tocWidget) {
                        tocWidget.style.display = 'none';
                    }
                }
            }
        });
    </script>
</body>

</html>